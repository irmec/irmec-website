<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //basic auth

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect($this->config->item('base_url').'auth/login');
        }
        $this->load->model('worker_model');
        $this->load->model('church_model');

    }

    public function index()
    {
        $data = array();

        //Number of pastors
        $data['workers_num'] = $this->worker_model->getNumWorkers();
        $data['churches_num'] = $this->church_model->getNumChurches();




        $data['content'] = $this->load->view('admin/dashboard', $data, TRUE);
        $this->render('admin', $data);
    }

}
