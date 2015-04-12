<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Carey Dayrit carey.dayrit@gmail.com
* Sample CRUD
*/


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
        if(!empty($keyword)){
            $data['workers'] = $this->worker_model->findAll("
                lastname like '%{$keyword}%' OR
                firstname like '%{$keyword}%'
            ");

        }else{
            $data['workers'] = $this->worker_model->findAll();
        }



        $data['content'] = $this->load->view('admin/workers/index', $data, true);
        $this->render('admin', $data);
    }

    /**
        add

    */

    public function add()
    {

      //load library


      //load helpers here

      $this->form_validation->set_rules('lastname', 'Last Name', 'required');
      $this->form_validation->set_rules('firstname', 'First Name', 'required');
      $this->form_validation->set_rules('middlename', 'Middle Name', 'required');

      if($this->form_validation->run() === true){
          $year = $this->input->post('year');
          $month = $this->input->post('month');
          $day = $this->input->post('day');
          $dob=null;
          if(!empty($year) && !empty($month) && !empty($day)){
              $dob = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
          }

          $params = array(
              'lastname'=>$this->input->post('lastname'),
              'firstname'=>$this->input->post('firstname'),
              'middlename'=>$this->input->post('middlename'),
              'phone'=>$this->input->post('phone'),
              'type'=>$this->input->post('type'),
                              'gender'=>$this->input->post('gender'),
              'status'=>$this->input->post('status'),
              'notes'=>$this->input->post('notes'),

              'insertedon'=>date('Y-m-d', time())
          );

          if(!empty($dob)){
               $params['dob'] = $dob;
          }
          //insert photo here

          //check if we have a photo
          if(!empty($_FILES['photo']['name'])){

            //set the configuration for file upload
            $upload_config['upload_path'] = './images/workers/';
            $upload_config['allowed_types'] = 'gif|jpg|png';
            $upload_config['max_size'] = '0';
            $upload_config['max_width'] = '1024';
            $upload_config['max_height'] = '768';
            $upload_config['file_name'] = time();
            //load upload library and initialize defaults
            $this->load->library('upload', $upload_config);

            if (!$this->upload->do_upload('photo')){
			    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                redirect(base_url().'admin/workers/add');
           	}
            $upload_data = $this->upload->data();

            $params['photo'] = $upload_data['file_name'];
          }


          $this->load->model('worker_model');
          $this->worker_model->save($params);

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
    public function edit($id)
    {
        //initialize variables
        $data=array();

        //load models here
        $this->load->model('worker_model');

        $worker = $this->worker_model->find("id=$id");

        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'required');


        //validate here
        if($this->form_validation->run() === true){
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $dob=null;
            if(!empty($year) && !empty($month) && !empty($day)){
              $dob = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
            }
            $params = array(
                'lastname'=>$this->input->post('lastname'),
                'firstname'=>$this->input->post('firstname'),
                'middlename'=>$this->input->post('middlename'),
                'gender'=>$this->input->post('gender'),
                'phone'=>$this->input->post('phone'),
                'type'=>$this->input->post('type'),
                'status'=>$this->input->post('status'),
                'notes'=>$this->input->post('notes')
            );
           //insert photo here
            if(!empty($dob)){
               $params['dob'] = $dob;
            }
          //insert photo here
          //check if we have a photo
          if(!empty($_FILES['photo']['name'])){
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

            if (!$this->upload->do_upload('photo')){
			    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                redirect(base_url().'admin/workers/edit/'.$worker['id']);
           	}
            $upload_data = $this->upload->data();

            $params['photo'] = $upload_data['file_name'];
          }
          $this->worker_model->save($params, $id);
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






}
