<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Carey Dayrit carey.dayrit@gmail.com
* Sample CRUD please conform with PSR-2
* Make sure inflector helper is included
*
*
*/

#name the class
class Downloads extends MY_Controller
{

    public $model;
    public $name = 'downloads';#class name



    public function __construct()
    {
        parent::__construct();
        $this->model= singular($this->name).'_model';
    }

    public function index()
    {
             //initialize variables
        $data = array();

        //initialize models
        $this->load->model($this->model);

        $keyword = $this->input->get('keyword') ? trim($this->input->get('keyword')) : null;
        if(!empty($keyword)){
            $data[$this->name] = $this->{$this->model}->findAll("name like '%{$keyword}%'");

        }else{
            $data[$this->name] = $this->{$this->model}->findAll();
        }
        $data['name'] = $this->name;
        $data['content'] = $this->load->view("admin/{$this->name}/index", $data, true);
        $this->render('admin', $data);

    }


    public function add()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');




        $data = array();



        if($this->form_validation->run() === true){


            $params = array(
              'name' => $this->input->post('name'),
              'description'=> $this->input->post('description'),
              'createdon'=>date('Y-m-d', time())
            );



            if(!empty($_FILES['file']['name'])){
              //set the configuration for file upload
              $upload_config['upload_path'] = './downloads/';
              $upload_config['allowed_types'] = 'pdf';
              $upload_config['max_size'] = '0';
              $upload_config['max_width'] = '2048';
              $upload_config['max_height'] = '1536';
              $upload_config['file_name'] = time();
              //load upload library and initialize defaults
              $this->load->library('upload', $upload_config);

              if (!$this->upload->do_upload('file')){
  			    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                redirect(base_url().'admin/'.$this->name.'/add');
             	}
              $upload_data = $this->upload->data();

              $params['file'] = $upload_data['file_name'];
            }

            $this->load->model($this->model);
            $this->{$this->model}->save($params);

            $this->session->set_flashdata('message','The record has been added');
            redirect(base_url().'admin/'.$this->name.'/index');
        }

        $data['name'] = $this->name;
        $data['content'] = $this->load->view('admin/'.$this->name.'/add', $data, true);
        $this->render('admin', $data);


    }


    public function edit($id=null)
    {
      //initialize variables
        $data=array();

        //load models here
        $this->load->model($this->model);



        $value = $this->{$this->model}->find("id=$id");

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        //validate here
        if($this->form_validation->run() === true){

            $params = array(
              'name' => $this->input->post('name'),
              'description'=> $this->input->post('description'),
              'updatedon'=>date('Y-m-d', time())
            );

            //insert photo here

            //check if we have a photo
            if(!empty($_FILES['file']['name'])){
              //set the configuration for file upload
              $upload_config['upload_path'] = './downloads/';
              $upload_config['allowed_types'] = 'pdf';
              $upload_config['max_size'] = '0';
              $upload_config['max_width'] = '2048';
              $upload_config['max_height'] = '1536';
              $upload_config['file_name'] = time();
              //load upload library and initialize defaults
              $this->load->library('upload', $upload_config);

              //remove old image
              @unlink($upload_config['upload_path'].$value['file']);

              if (!$this->upload->do_upload('file')){
  			    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                  redirect(base_url().'admin/'.$this->name.'/edit/'.$value['id']);
             	}
              $upload_data = $this->upload->data();

              $params['file'] = $upload_data['file_name'];
            }

            $this->{$this->model}->save($params, $id);
            //put a flash message
            $this->session->set_flashdata('message','The record has been updated');
            redirect(base_url().'admin/'.$this->name);


        }


        $data['value'] = $value;
         $data['name'] = $this->name;
        $data['content'] = $this->load->view('admin/'.$this->name.'/edit', $data, true);
        $this->render('admin', $data);


    }


    public function remove($id=null)
    {
        $this->load->model($this->model);

        $this->{$this->model}->remove($id);

        $this->session->set_flashdata('message','The record has been removed');
        redirect(base_url().'admin/'.$this->name);
    }

    public function view($id=null)
    {
        //initialize variables
        $data=array();

        //load models here
        $this->load->model($this->model);


        $data['value'] = $this->{$this->model}->find("id=$id");
        $data['name'] = $this->name;
        $data['content'] = $this->load->view('admin/'.$this->name.'/view', $data, true);
        $this->render('admin', $data);


    }

}