<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Town_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->loadTable('towns');

    }

    public function getAll()
    {
        $sql ="select t.id, t.name as town_name, p.name as province_name
            from provinces p inner join towns t on p.id=t.province_id";

        return $this->db->query($sql)->result_array();

    }

    public function select()
    {
        $sql ="select t.id, t.name as town_name, p.name as province_name
            from provinces p inner join towns t on p.id=t.province_id";

        $result = $this->db->query($sql)->result_array();
        $options = array();
        foreach($result as $o){
            $options[$o['id']]= $o['town_name'].", ".$o['province_name'];
        }

        return $options;

    }

    public function select_province()
    {
        $sql ="select id, name FROM provinces";

        $result = $this->db->query($sql)->result_array();
        $options = array();
        foreach($result as $o){
            $options[$o['id']]=$o['name'];
        }

        return $options;
    }


}