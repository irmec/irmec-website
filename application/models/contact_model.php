<?php

class Contact_Model extends MY_Model{
	
	public function __construct()
    {
        parent::__construct();
        $this->loadTable('contact');

    }
    
	
}
