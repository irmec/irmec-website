<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Download_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->loadTable('downloads');

    }
}