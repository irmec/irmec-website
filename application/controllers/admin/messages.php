<?php

class Messages extends MY_Controller{
	
	public function __construct(){
		
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect($this->config->item('base_url').'auth/login');
        }
		
	}
	
	public function index(){
		$this->load->library('pagination');
		
        //initialize models
        $this->load->model('contact_model');
        
        $data['messages'] = $this->contact_model->findAll(null, '*', 'id DESC');
        $data['content'] = $this->load->view('admin/messages/index', $data, true);
        
        $this->render('admin', $data);        		
		
	}
	
}
