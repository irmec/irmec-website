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
        $data['content'] = $this->load->view('church/location', null, true);
        $this->render('landing', $data);
    }




}