<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Workers_family_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->loadTable('workers_families');

    }
  


}
