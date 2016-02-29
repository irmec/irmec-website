<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Carey Dayrit carey.dayrit@gmail.com
*/

class Church_Location_Model  extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
         $this->loadTable('church_location');

        /*
        if (!$this->ion_auth->logged_in())
        {
        	//redirect them to the login page
        	redirect($this->config->item('base_url').'auth/login');
        }
        */
    }

}
