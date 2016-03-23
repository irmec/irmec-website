<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */
class Workers extends MY_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->database();
		$this->load->model('worker_model');
		
	}
	
	public function index()
	{
		redirect('/');
			
	}
	
	public function masterlist()
	{
		$sql = "SELECT lastname, nickname, middlename, gender, 
				case when volunteer_to = 'present' then 'Ministry Assistant' 	
					when probationary_to ='present' and gender ='Male' then 'Pastor' 
					when probationary_to ='present' and gender ='Female' then 'Deaconess'
					when ordained_to='present' and gender ='Male' then 'Ordained Pastor'
					when ordained_to='present' and gender ='Female' then 'Ordained Deaconess'
					when ordained_to='Emeritus' then 'Emeritus'
				end as designation,
				case when sss='' then '' else 'with data' end as sss,
				case when philhealth='' then '' else 'with data' end as phil_health,
				case when cell_phone ='' then '' else 'with data' end as cellphone,
				case when notify_person='' then '' else 'with data' end as contact_person,
				case when notify_phone ='' then '' else 'with data' end as contact_phone
			from workers w join workers_ministries wm on w.id=wm.workers_id	 join workers_families wf on w.id=wf.workers_id
			where probationary_to='present' or ordained_to='present' or volunteer_to = 'present' or ordained_to='emeritus'
			order by lastname, firstname, middlename";
		$this->set_fbmeta(array(
			'title'=>'IRMEC Workers Masterlist',
			'description'=>'The workers masterlist with status of data',
			'image'=>site_url().'images/masterlist.png',
			'url'=>site_url('workers/masterlist')
			
		));
		$data['workers'] = $this->db->query($sql)->result_array();
		$data['content'] = $this->load->view('workers/masterlist', $data, true);
		$this->render('landing', $data);
	}
	
}
