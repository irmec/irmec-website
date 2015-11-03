 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */
class Pub extends MY_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('contact_us');
        $this->load->model('church_model');
    }

    public function index() {

    	$this->form_validation->set_rules('latitude', 'Latitude','required');
    	$this->form_validation->set_rules('longitude', 'Longitude','required');

    	$data['select_church'] = $this->church_model->getChurch(); 

    	 if($this->form_validation->run() === true)
        {


            $params = array(
            			  'church' => $this->input->post('church'),
                          'latitude' => $this->input->post('latitude'),
                          'longitude' => $this->input->post('longitude')
                          
                      );

         $this->load->model->church_location();
         $this->church_location->save($params);

         $this->session->set_flashdata('message','The record has been added');
         redirect(base_url().'churchloc/index');
            
         }

       


        $data['content'] = $this->load->view('church/location', null, true);
        $this->render('landing', $data);
    }




}