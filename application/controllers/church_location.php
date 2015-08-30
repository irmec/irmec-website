<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */

class Church_Location extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');        
        
        $this->load->database();
        $this->load->model('churchlocation_model');
        $this->load->model('town_model');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index()
    {
        
       $this->form_validation->set_rules('church', 'Church','required');
       $this->form_validation->set_rules('longitude', 'Longitude','required');
       $this->form_validation->set_rules('latitude', 'Latitude','required');

       $data = array();

       if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['content'] = $this->load->view('church_location/index', null, true);
            $this->render('landing', $data);

        } else {

                 $form_data = array(
                'church' => set_value('church'),
                'longitude' => set_value('longitude'),
                'latitude' => set_value('latitude'),
               
            );
            
               $this->load->model('churchlocation_model');
               $this->churchlocation_model->SaveForm($form_data);

                    $data['content'] = $this->load->view('church_location/indexfile', null, true);
                    $this->render('landing', $data);
                    $this->load->view('pub/alert');

            } 

                
                    
                // Or whatever error handling is necessary
            

       
    }

     public function church($str)
    {
        
    if ($str == '')
    {
        $this->form_validation->set_message('church', 'The Church field is required.' );
        return FALSE;
    }
    else
    {
        return TRUE;
    }
    }
    
}

