<?php

error_reporting(~E_WARNING & ~E_NOTICE);

require('application/libraries/facebook/facebook.php');

class Cron extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if(empty($_SERVER['REMOTE_ADDR'])){
			$_SERVER['REMOTE_ADDR']='127.0.0.1';			
		}
	}
	
	public function birthdays(){
		//get day
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$day = date('j');
		$month = date('n');
		$page_id = FB_PAGE_ID;
		
		$sql = "SELECT
				case when gender = 'Male' then 'Ptr.' ELSE 'Deac.' end as pre,
				firstname, 
				case when nickname != '' then nickname ELSE firstname end as nick,
				lastname, dob
				FROM workers WHERE MONTH(dob) = $month  AND DAY(dob) = $day ORDER BY lastname, firstname";
		
		$result = $this->db->query($sql)->result_array();
		if(count($result) == 0){
			exit();			
		}
		$fb_app_id = $this->config->item('fb_app_id');
		$fb_app_secret = $this->config->item('fb_app_secret');
	    
    	$facebook = new Facebook(array(
                                     'appId'  => FB_APP_ID,
                                     'secret' => FB_APP_SECRET
                        ));
				
		$access_token = $this->config->item('fb_access_token');	
		$message = 'Happy Birthday '."\n\r";
		foreach($result as $dob){
				$message .= $dob['pre'].' '.$dob['nick'].' '.$dob['lastname']."\n\r";
		}
		$message .="\n\r---from your IRMEC Family";
		
		$args = array(
			'access_token'  => $access_token,
			'message'       => $message
		);
		$post_id = $facebook->api("/$page_id/feed","post",$args);
        exit();    
		
	}
	
	public function votd(){
		//get the verse
		$version_id = 9;
		$votd_url = "http://www.biblegateway.com/usage/votd/rss/votd.rdf?$version_id";
		
		$xml_str = file_get_contents($votd_url);
		
		if($xml_str){
			$xml_obj = simplexml_load_string($xml_str);
		
			$facebook = new Facebook(array(
                                     'appId'  => FB_APP_ID,
                                     'secret' => FB_APP_SECRET
                        ));
				
			$access_token = $this->config->item('fb_access_token');		
			
			$content = (string)$xml_obj->channel->item->children("content", true)->encoded;
			//process verse
			//strip
			$process_v = explode("<br/>", $content);
			$title = $xml_obj->channel->item->title;
			$verse = html_entity_decode(trim($process_v[0]));
			$message="$title (KJV) \n\r\n\r"
				."$verse";
				
			$args = array(
				'access_token'  => $access_token,
				'message'       => $message
			);
			$post_id = $facebook->api("/$page_id/feed","post",$args);
			exit();    
		}										
	}
	
	public function check_cellphone(){
		$sql = "select cell_phone
			from workers
			where cell_phone !='' and cell_phone != '+85262732172'";
			
		$workers = $this->db->query($sql)->result_array();
	
		if(!empty($workers)){
			foreach($workers as $worker){
				if(strlen(trim($worker['cell_phone'])) < 11){
					echo $worker['cell_phone'];										
					echo PHP_EOL;
				}
				
				if(strlen(trim($worker['cell_phone'])) > 11){
					echo $worker['cell_phone'];										
					echo PHP_EOL;
				}
			}
			exit();
		}
		
		echo 'false';		
		
	}
	
	public function no_cellphone(){
		$sql = "select 
			case when gender = 'Male' then 'Ptr.' ELSE 'Deac.' end as pre,
			lastname, firstname, cell_phone
			from workers
			where cell_phone =''";
		
		$workers = $this->db->query($sql)->result_array();
		
		if(!empty($workers)){
			foreach($workers as $worker){
				
					echo $worker['pre'].' '. $worker['lastname'].', '.$worker['firstname'];										
					echo PHP_EOL;
				
			}
			exit();
		}
		
		echo 'false';
	}
	
}
