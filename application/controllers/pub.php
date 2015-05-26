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
    }

    public function index() {
        $data['content'] = $this->load->view('home/index', null, true);
        $this->render('landing', $data);
    }

    public function history() {
        $data = array();
        $data['content'] = $this->load->view('pub/history', $data, true);
        $this->render('landing', $data);
    }

    public function contact() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[32]');
        $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[50]');
        $this->form_validation->set_rules('message', 'Message', 'required');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['content'] = $this->load->view('pub/contact', null, true);
            $this->render('landing', $data);

        } else {

            $form_data = array(
                'email' => set_value('email'),
                'subject' => set_value('subject'),
                'message' => set_value('message')
            );
            
            $headers = "From: <". $form_data['email'] . ">" ;

			// run insert model to write data to db

            if ($this->contact_us->SaveForm($form_data) == TRUE) {
					mail('irmec92@gmail.com', $form_data['subject'], $form_data['message'], $headers);
					
                    redirect('pub/success');
            } else {
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
        }
    }

    public function about()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/about', null, true);
        $this->render('landing', $data);
    }

    public function success()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/contact-success', null, true);
        $this->render('landing', $data);
    }

    public function foreign()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/foreign', $data, true);
        $this->render('landing', $data);
    }

    public function council()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/council', $data, true);
        $this->render('landing', $data);
    }



    public function workers()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/churches', $data, true);
        $this->render('landing', $data);
    }


    public function workers_profile()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/workers_profile', $data, true);
        $this->render('landing', $data);
    }

    public function resource($id)
    {
        $this->load->model('download_model');

        $data = array();

        $data['resource'] = $this->download_model->find('id='.$id);

        $this->fbmeta_data = array(
          'title'=>$data['resource']['name'],
          'description'=>$data['resource']['description'],
          'url'=>base_url().'pub/resource/'.$id
        );


        $data['content'] = $this->load->view('pub/resource', $data, true);
        $this->render('landing', $data);
    }

    public function resources()
    {
        $this->load->model('download_model');

        $data = array();

        $data['resources'] = $this->download_model->findAll(null, '*', 'createdon DESC' );

        $data['content'] = $this->load->view('pub/resources', $data, true);
        $this->render('landing', $data);
    }

}
