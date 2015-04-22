<?php


class Test extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->library('ion_auth');
		
		$this->ion_auth->change_password('admin@irmevangelicalchurch.org', 'password', 'demo');
		
		
	}
}