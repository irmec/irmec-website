<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Carey Dayrit carey.dayrit@gmail.com
* Sample CRUD please conform with PSR-2
*/


class Churches extends MY_Controller
{
    public $anniversary_months;
    public $anniversary_weeks;

    public function __construct()
    {
        parent::__construct();


        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect($this->config->item('base_url').'auth/login');
        }

        $this->anniversary_months = array(
                                        0=>'----',
                                        1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June',7=> 'July',
                                        8=>'August', 9=>'Septempber', 10=>'October',11=> 'November',12=>'December'

                                    );

        $this->anniversary_weeks = array(
                                       0=>'----',
                                       1=>'First',
                                       2=>'Second',
                                       3=>'Third',
                                       4=>'Fourth',
                                       5=>'Fifth'

                                   );

    }
    /**
        Churches list
    */
    public function index()
    {
        $this->load->library('pagination');

        //initialize models
        $this->load->model('church_model');

        $keyword= $this->input->post('keyword');

        if(empty($keyword))
        {
#post is empty
#try the uri segment
            if($this->uri->segment(5,0))
            {
                $keyword = $this->uri->segment(4);
            }
        }
        $churchesCount = $this->church_model->getNumChurches($keyword);
        //pagination
        if(empty($keyword))
        {
#loading different config if keyword is present
            $config['base_url'] = base_url()."admin/churches/index/";
            $config['uri_segment'] = 4;
        }
        else
        {
#with keyword
            $keyword_url = urlencode($keyword);

            $config['base_url'] = base_url()."admin/churches/index/{$keyword_url}/";
            $config['uri_segment'] = 5;

        }


#config per bootstrap
        $config['full_tag_open'] = '<ul  class="pagination">';
        $config['full_tag_close'] ='</ul>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';


        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';


        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['total_rows'] = $churchesCount;
        $config['per_page'] = '20';

        $this->pagination->initialize($config);

        $cur_page = $this->uri->segment( $config['uri_segment'], 0);

        //initialize variables
        $data = array();

        $data['churches'] = $this->church_model->getNumChurches($keyword, $cur_page);

        $data['content'] = $this->load->view('admin/churches/index', $data, true);
        $this->render('admin', $data);
    }

    /**
        add

    */

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        //towns
        $this->load->helper('form');
        $this->load->model('town_model');
        $data = array();
        $data['towns'] = $this->town_model->select();


        if($this->form_validation->run() === true)
        {
            $month = $this->input->post('month');
            $week = $this->input->post('week');


            $params = array(
                          'name' => $this->input->post('name'),
                          'anniversary_month' => $month,
                          'anniversary_week' =>$week,
                          'address' => $this->input->post('address'),
                          'town_id' => $this->input->post('town_id'),
                          'zip_code' => $this->input->post('zip_code'),
                          'map'=> $this->input->post('map'),
                          'createdon'=>date('Y-m-d', time()),
						  'longitude' => $this->input->post('longitude'),
						  'latitude' => $this->input->post('latitude')
                      );



            if(!empty($_FILES['photo']['name']))
            {
                //set the configuration for file upload
                $upload_config['upload_path'] = './images/churches/';
                $upload_config['allowed_types'] = 'gif|jpg|png';
                $upload_config['max_size'] = '0';
                $upload_config['max_width'] = '2048';
                $upload_config['max_height'] = '1536';
                $upload_config['file_name'] = time();
                //load upload library and initialize defaults
                $this->load->library('upload', $upload_config);

                if (!$this->upload->do_upload('photo'))
                {
                    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                    redirect(base_url().'admin/churches/add');
                }
                $upload_data = $this->upload->data();

                $params['photo'] = $upload_data['file_name'];
            }

            $this->load->model('church_model');
            $this->church_model->save($params);

            $this->session->set_flashdata('message','The record has been added');
            redirect(base_url().'admin/churches/index');
        }

        $data['anniversary_months'] = $this->anniversary_months;
        $data['anniversary_weeks'] = $this->anniversary_weeks;

        $data['content'] = $this->load->view('admin/churches/add', $data, true);
        $this->render('admin', $data);
    }

    /**
       edit
       id is the church id
    */
    public function edit($id)
    {
        //initialize variables
        $data=array();

        //load models here
        $this->load->model('church_model');

        //towns
        $this->load->helper('form');
        $this->load->model('town_model');

        $church = $this->church_model->find("id=$id");

        $this->form_validation->set_rules('name', 'Name', 'required');

        //validate here
        if($this->form_validation->run() === true)
        {
            $month = $this->input->post('month');
            $week = $this->input->post('week');


            $params = array(
                          'name'=>$this->input->post('name'),
                          'anniversary_month'=>$month,
                          'anniversary_week'=>$week,
                          'address'=>$this->input->post('address'),
                          'town_id'=>$this->input->post('town_id'),
                          'zip_code'=>$this->input->post('zip_code'),
                          'map'=> $this->input->post('map'),
						  'longitude' => $this->input->post('longitude'),
						  'latitude' => $this->input->post('latitude')
                      );


            //insert photo here

            //check if we have a photo
            if(!empty($_FILES['photo']['name']))
            {
                //set the configuration for file upload
                $upload_config['upload_path'] = './images/churches/';
                $upload_config['allowed_types'] = 'gif|jpg|png';
                $upload_config['max_size'] = '0';
                $upload_config['max_width'] = '2048';
                $upload_config['max_height'] = '1536';
                $upload_config['file_name'] = time();
                //load upload library and initialize defaults
                $this->load->library('upload', $upload_config);

                //remove old image
                @unlink($upload_config['upload_path'].$church['photo']);

                if (!$this->upload->do_upload('photo'))
                {
                    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                    redirect(base_url().'admin/churches/edit/'.$church['id']);
                }
                $upload_data = $this->upload->data();

                $params['photo'] = $upload_data['file_name'];
            }

            $this->church_model->save($params, $id);
            //put a flash message
            $this->session->set_flashdata('message','The record has been updated');
            redirect(base_url().'admin/churches');


        }

        $data['anniversary_months'] = $this->anniversary_months;

        $data['anniversary_weeks'] = $this->anniversary_weeks;
        $data['towns'] = $this->town_model->select();
        $data['church'] = $this->church_model->find("id=$id");

        $data['content'] = $this->load->view('admin/churches/edit', $data, true);
        $this->render('admin', $data);

    }
    /** Remove Church **/

    public function remove($id)
    {
        $this->load->model('church_model');

        $this->church_model->remove($id);

        $this->session->set_flashdata('message','The record has been removed');
        redirect(base_url().'admin/churches');
    }

    public function view($id)
    {
        //initialize variables
        $data=array();

        //load models here
        $this->load->model('church_model');

        $data['anniversary_months'] = $this->anniversary_months;

        $data['anniversary_weeks'] = $this->anniversary_weeks;

        $data['church'] = $this->church_model->find("id=$id");

        $data['content'] = $this->load->view('admin/churches/view', $data, true);
        $this->render('admin', $data);
    }


}
