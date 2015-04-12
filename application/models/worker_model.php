<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Worker_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->loadTable('workers');

    }

    public function getNumWorkers()
    {
        return $this->db->count_all('workers');

    }


}