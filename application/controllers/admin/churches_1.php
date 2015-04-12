<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */
class Churches extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index()
    {
        //
        $data = array();
        $this->load->model('church_model');
        $this->load->model('town_model');

        $keyword  = $this->input->get('keyword') ? trim($this->input->get('keyword')) : null;
        $province = $this->input->get('province') ? trim($this->input->get('province')) : null;

        $data['select_province'] = $this->town_model->select_province();

        if($keyword || $province){
              $data['featured_churches'] = $this->church_model->searchChurches($keyword, $province);

        }else{
             $data['featured_churches'] = $this->church_model->getRandomChurches();
        }

        //var_dump($data['featured_churches']);
        $data['content'] = $this->load->view('churches/index', $data, true);
        $this->render('landing', $data);

    }

    public function profile($id=null)
    {
      if(empty($id)){
        redirect('/churches');
      }
      $this->load->model('church_model');


      $data = array();
      $data['church'] = $this->church_model->getChurch($id);
      if(empty($data['church'])){
        redirect('/churches');
      }

      $this->fbmeta_data = array(
          'title'=>$data['church']['name'],
          'description'=>$data['church']['address'].' '.$data['church']['town_name'].' '.$data['church']['province_name'],
          'url'=>base_url().'churches/profile/'.$id,
          'image'=>base_url().'images/churches/'.$data['church']['photo']
        );

      $data['content'] = $this->load->view('churches/profile', $data, true);
      $this->render('landing', $data);


    }


    //for search usually do this as Get


    public function search()
    {



    }





}


