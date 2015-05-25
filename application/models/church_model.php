<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Carey Dayrit <carey@irmevangelicalchurch.org>
 * @package irmec-website
 * 
 */



class Church_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this->loadTable('churches');
	}

	public function getNumChurches()
	{
		return $this->db->count_all('churches');
	}

	public function getRandomChurches()
	{
		$sql = "SELECT c.*,t.name as town_name, p.name as province_name
				FROM churches c inner join towns t on c.town_id = t.id
				inner join provinces p on t.province_id=p.id
				LIMIT 0,10";

		return $this->db->query($sql)->result_array();
	}

	public function getChurch($id = null)
	{
		$sql = "
            SELECT c.*,t.name as town_name, p.name as province_name
            FROM churches c inner join towns t on c.town_id = t.id
            inner join provinces p on t.province_id=p.id
            WHERE c.id={$id}";

		return $this->db->query($sql)->row_array();
	}

	public function searchChurches($keyword = NULL, $province = NULL, $page = 1, $limit = 20)
	{
		#build criteria
		if ($province == 'All')
		{
			$province = NULL;
		}


		$sql = "
            SELECT c.*, t.name as town_name, p.name as province_name
            FROM churches c
            INNER JOIN  towns t on c.town_id = t.id
            INNER JOIN provinces p ON t.province_id=p.id";

		if ($keyword || $province)
		{
			$sql .= " WHERE ";
			if (!empty($keyword))
			{
				$sql .= " c.name like '%{$keyword}%' OR c.address like '%{$keyword}%' OR t.name like '%{$keyword}%' OR p.name like '%{$keyword}%'  ";
			}

			if (!empty($keyword) && !empty($province))
			{
				$sql .=' AND ';
			}

			if (!empty($province))
			{
				$sql .= " province_id={$province} ";
			}
		}

		$sql .=" LIMIT 0,{$limit}";

		return $this->db->query($sql)->result_array();
	}

	public function searchChurchesCount($keyowrd = NULL, $province = NULL)
	{
		if ($province == 'All')
		{
			$province = NULL;
		}


		$sql = "
            SELECT c.*, t.name as town_name, p.name as province_name
            FROM churches c
                INNER JOIN  towns t on c.town_id = t.id
                INNER JOIN provinces p ON t.province_id=p.id";

		if ($keyword || $province)
		{
			$sql .= " WHERE ";
			if (!empty($keyword))
			{
				$sql .= " c.name like '%{$keyword}%' OR c.address like '%{$keyword}%' OR t.name like '%{$keyword}%' OR p.name like '%{$keyword}%'  ";
			}

			if (!empty($keyword) && !empty($province))
			{
				$sql .=' AND ';
			}

			if (!empty($province))
			{
				$sql .= " province_id={$province} ";
			}
		}

		return $this->db->query($sql)->num_rows();
	}

	#we made this method for including search for town name and province name

	public function getChurchesSearchCount($keyword = null)
	{
		$sql = "
            SELECT c.*, t.name as town_name, p.name as province_name
            FROM churches c
                INNER JOIN  towns t on c.town_id = t.id
                INNER JOIN provinces p ON t.province_id=p.id";

		if ($keyword)
		{
			$sql .= " WHERE ";
			if (!empty($keyword))
			{
				$sql .= " c.name like '%{$keyword}%' OR c.address like '%{$keyword}%' OR t.name like '%{$keyword}%' OR p.name like '%{$keyword}%'  ";
			}
		}
		return $this->db->query($sql)->num_rows();
	}

	public function getChurchesSearch($keyword = null, $page = 1, $limit = 20)
	{
		$sql = "
            SELECT c.*, t.name as town_name, p.name as province_name
            FROM churches c
                INNER JOIN  towns t on c.town_id = t.id
                INNER JOIN provinces p ON t.province_id=p.id";

		if ($keyword)
		{
			$sql .= " WHERE ";
			if (!empty($keyword))
			{
				$sql .= " c.name like '%{$keyword}%' OR c.address like '%{$keyword}%' OR t.name like '%{$keyword}%' OR p.name like '%{$keyword}%'  ";
			}
		}

		$sql .= " ORDER BY c.id DESC LIMIT {$page}, {$limit} ";

		$result = $this->db->query($sql)->result_array();

		return (!empty($result)) ? $result : false;
	}
}