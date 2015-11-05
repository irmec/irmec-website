 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */
class Churchloc extends MY_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('contact_us');
        $this->load->model('church_model');
		$this->load->helper(array('form', 'url'));
    }

    public function index() {

       $this->form_validation->set_rules('church', 'Church', 'callback_church_check');
       $this->form_validation->set_rules('longitude', 'Longitude','required');
       $this->form_validation->set_rules('latitude', 'Latitude','required');

    	$data['select_church'] = $this->church_model->churchloc();

    	 if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['content'] = $this->load->view('churches/location', $data, true);
            $this->render('landing', $data);

        } else {

                 $form_data = array(

                'church' => set_value('church'),
                'longitude' => set_value('longitude'),
                'latitude' => set_value('latitude'),
               
            );
            
               $this->load->model('church_location_model');
               $this->church_location_model->save($form_data);

                $this->session->set_flashdata('message','The record has been added');
            	redirect(base_url().'churchloc/index');

            } 

    }
	
	public function church_check($str) {

    	if ($str == '- Select Church -') {

    		$this->form_validation->set_message('church_check', 'Please Select %s!' );
    		return FALSE;

    	} else {

    		return TRUE;
    	}

    }



}