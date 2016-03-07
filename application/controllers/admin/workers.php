<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Carey Dayrit carey.dayrit@gmail.com
*/
include(APPPATH. 'libraries/barcode_generator/BarcodeGenerator.php');
include(APPPATH. 'libraries/barcode_generator/BarcodeGeneratorPNG.php');
include(APPPATH. 'libraries/barcode_generator/BarcodeGeneratorSVG.php');
include(APPPATH. 'libraries/barcode_generator/BarcodeGeneratorHTML.php');

class Workers extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect($this->config->item('base_url').'auth/login');
        }
    }
    /**
        Pastor's list
     */

    public function index()
    {
        //initialize variables
        $data = array();

        //initialize models
        $this->load->model('worker_model');
        $keyword = $this->input->get('keyword') ? trim($this->input->get('keyword')) : null;
        if(!empty($keyword))
        {
            $data['workers'] = $this->worker_model->findAll("
                               lastname like '%{$keyword}%' OR
                               firstname like '%{$keyword}%'
                               ");

        }
        else
        {
            $data['workers'] = $this->worker_model->findAll(null,null,"insertedon DESC,updatedon DESC");
        }



        $data['content'] = $this->load->view('admin/workers/index', $data, true);
        $this->render('admin', $data);
    }

    /**
        add

    */

    public function add()
    {
        $this->load->model('worker_model');
        $this->load->model('workers_family_model');
         
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'required');

        if($this->form_validation->run() === true)
        {
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $dob=null;
            if(!empty($year) && !empty($month) && !empty($day))
            {
                $dob = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
            }

            $params = array(
						  /** fields **/
				  'lastname' =>$this->input->post('lastname'),
				  'firstname' =>$this->input->post('firstname'),
				  'middlename' =>$this->input->post('middlename'),
				  'nickname' => $this->input->post('nickname'),
				  'place_birth' => $this->input->post('place_birth'),
				  'status' => $this->input->post('status'),
				  'gender' => $this->input->post('gender'),
				  'height' => $this->input->post('height'),
				  'weight' => $this->input->post('weight'),
				  'email' => $this->input->post('email'),                                                    
				  'phone'=> $this->input->post('phone'),
				  'cell_phone' => $this->input->post('cell_phone'),
				  'passport' => $this->input->post('passport'),
				  'sss' => $this->input->post('sss'),
				  'philhealth' => $this->input->post('philhealth'),
				  'tin' => $this->input->post('tin'),
				  'permanent_address' => $this->input->post('permanent_address'),
																	  
				  'insertedon'=>date('Y-m-d', time())
                );
			
			$params_family = array(
				'fathers_name'=> $this->input->post('fathers_name'),
				'fathers_province'=> $this->input->post('fathers_province'),
				'mothers_name'=> $this->input->post('mothers_name'),
				'mothers_province'=> $this->input->post('mothers_province'),
				'spouse_name'=> $this->input->post('spouse_name'),
				'spouse_dob'=> $this->input->post('spouse_dob'),
				'wedding_dow'=> $this->input->post('wedding_dow'),
				'children'=> $this->input->post('children'),
				'spouse_occupation'=> $this->input->post('spouse_occupation'),
				'present_address'=> $this->input->post('present_address'),
				'notify_person'=> $this->input->post('notify_person'),
				'notify_address'=> $this->input->post('notify_address'),
				'notify_phone'=> $this->input->post('notify_phone')						
				);
				

            if(!empty($dob))
            {
                $params['dob'] = $dob;
            }
            //insert photo here

            //check if we have a photo
            if(!empty($_FILES['photo']['name']))
            {

                //set the configuration for file upload
                $upload_config['upload_path'] = './images/workers/';
                $upload_config['allowed_types'] = 'gif|jpg|png';
                $upload_config['max_size'] = '0';
                $upload_config['max_width'] = '1024';
                $upload_config['max_height'] = '768';
                $upload_config['file_name'] = time();
                //load upload library and initialize defaults
                $this->load->library('upload', $upload_config);

                if (!$this->upload->do_upload('photo'))
                {
                    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                    redirect(base_url().'admin/workers/add');
                }
                $upload_data = $this->upload->data();

                $params['photo'] = $upload_data['file_name'];
            }


            
            $id = $this->worker_model->save($params);
            $params_family['workers_id']= $id;
            $this->workers_family_model->save($params_family);
			
            $this->session->set_flashdata('message','The record has been added');
            redirect(base_url().'admin/workers/index');
        }

        $data = array();
        $data['content'] = $this->load->view('admin/workers/add', $data, true);
        $this->render('admin', $data);


    }
    /**
        edit
        id is the pastor's id
     */
    public function edit($id = null)
    {
        //initialize variables
        if(empty($id)){
			redirect('/admin/workers');
		}
        $data=array();

        //load models here
        $this->load->model('worker_model');
        $this->load->model('workers_family_model');

        $worker = $this->worker_model->find("id=$id");
        $workers_family = $this->workers_family_model->find('workers_id='. $id);
        if(is_array($workers_family)){
			$worker = array_merge($worker, $workers_family);
		}

        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'required');


        //validate here
        if($this->form_validation->run() === true)
        {
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $dob=null;
            if(!empty($year) && !empty($month) && !empty($day))
            {
                $dob = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
            }
            $params = array(
				  'lastname' =>$this->input->post('lastname'),
				  'firstname' =>$this->input->post('firstname'),
				  'middlename' =>$this->input->post('middlename'),
				  'nickname' => $this->input->post('nickname'),
				  'place_birth' => $this->input->post('place_birth'),
				  'status' => $this->input->post('status'),
				  'gender' => $this->input->post('gender'),
				  'height' => $this->input->post('height'),
				  'weight' => $this->input->post('weight'),
				  'email' => $this->input->post('email'),                                                    
				  'phone'=> $this->input->post('phone'),
				  'cell_phone' => $this->input->post('cell_phone'),
				  'passport' => $this->input->post('passport'),
				  'sss' => $this->input->post('sss'),
				  'philhealth' => $this->input->post('philhealth'),
				  'tin' => $this->input->post('tin'),
				  'permanent_address' => $this->input->post('permanent_address')
                );
                     
            $params_family = array(
				'fathers_name'=> $this->input->post('fathers_name'),
				'fathers_province'=> $this->input->post('fathers_province'),
				'mothers_name'=> $this->input->post('mothers_name'),
				'mothers_province'=> $this->input->post('mothers_province'),
				'spouse_name'=> $this->input->post('spouse_name'),
				'spouse_dob'=> $this->input->post('spouse_dob'),
				'wedding_dow'=> $this->input->post('wedding_dow'),
				'spouse_occupation'=> $this->input->post('spouse_occupation'),
				'children'=> $this->input->post('children'),
				'present_address'=> $this->input->post('present_address'),
				'notify_person'=> $this->input->post('notify_person'),
				'notify_address'=> $this->input->post('notify_address'),
				'notify_phone'=> $this->input->post('notify_phone'),
				'workers_id'=> $id			
				);
            //insert photo here
            if(!empty($dob))
            {
                $params['dob'] = $dob;
            }
            //insert photo here
            //check if we have a photo
            if(!empty($_FILES['photo']['name']))
            {
                //set the configuration for file upload
                $upload_config['upload_path'] = './images/workers/';
                $upload_config['allowed_types'] = 'gif|jpg|png';
                $upload_config['max_size'] = '0';
                $upload_config['max_width'] = '1024';
                $upload_config['max_height'] = '768';
                $upload_config['file_name'] = time();
                //load upload library and initialize defaults
                $this->load->library('upload', $upload_config);

                //remove old image
                @unlink($upload_config['upload_path'].$worker['photo']);

                if (!$this->upload->do_upload('photo'))
                {
                    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                    redirect(base_url().'admin/workers/edit/'.$worker['id']);
                }
                $upload_data = $this->upload->data();

                $params['photo'] = $upload_data['file_name'];
            }
            $this->worker_model->save($params, $id); 
            //find the workers family, else save it
            if($workers_family_id = $this->workers_family_model->find('workers_id='.$id,'id')){
				$this->workers_family_model->save($params_family, $workers_family_id['id']);				
			}else{
				$this->workers_family_model->save($params_family);								
			}
                                   
            $this->workers_family_model->save($params_family);
            //put a flash message
            $this->session->set_flashdata('message','The record has been updated');
            redirect(base_url().'admin/workers');


        }

        //split dob
        $worker['month']= date('m', strtotime($worker['dob']));
        $worker['day']= date('d', strtotime($worker['dob']));
        $worker['year']= date('Y', strtotime($worker['dob']));

        $data['worker'] = $worker;

        $data['content'] = $this->load->view('admin/workers/edit', $data, true);
        $this->render('admin', $data);



    }

    public function remove($id)
    {
        $this->load->model('worker_model');

        $this->worker_model->remove($id);

        $this->session->set_flashdata('message','The record has been removed');
        redirect(base_url().'admin/workers');
    }

    public function view($id)
    {
        //initialize variables
        $data=array();

        //load models here
        $this->load->model('worker_model');


        $data['worker'] = $this->worker_model->find("id=$id");

        $data['content'] = $this->load->view('admin/workers/view', $data, true);
        $this->render('admin', $data);
    }
    
    public function bar_code($id)
    {
		$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
		$barcode = 199200000000 + $id;
		header('Content-type: image/png');
		
		echo $generatorPNG->getBarcode('1992', $generatorPNG::TYPE_CODE_128);
		
	}
}
