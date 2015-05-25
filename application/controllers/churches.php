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
        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index($cur_page = 1)
    {
        //
        
        $data = array();
        $this->load->model('church_model');
        $this->load->model('town_model');

        $keyword  = $this->input->get('keyword') ? trim($this->input->get('keyword')) : null;
        
        $province = $this->input->get('province') ? trim($this->input->get('province')) : null;        
        
        $data['select_province'] = $this->town_model->select_province();        
       
        $config['per_page'] = '20';
        
        
        
        if($keyword || $province){
              $data['featured_churches'] = $this->church_model->searchChurches($keyword, $province);              
              $num_rows = count($data['featured_churches']);

        }else{
             $data['featured_churches'] = $this->church_model->getChurchesSearch(null,$cur_page, $config['per_page']);
             $num_rows = $this->church_model->getChurchesSearchCount();
             $config['uri_segment'] = 2;
             $config['base_url'] = base_url()."churches/index/";
        }
                        
        $config['total_rows'] = $num_rows;

			// set the current page to first page
        $config['cur_page'] = $cur_page;
        
        
        
        $this->pagination->initialize($config);
        
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

    
}


