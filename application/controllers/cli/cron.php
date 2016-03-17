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
		$sql = "select 
				case when gender = 'Male' then 'Ptr.' ELSE 'Deac.' end as pre,
				firstname, 
				case when nickname != '' then nickname ELSE firstname end as nick,
				lastname, dob
				from workers where MONTH(dob) = $month  order by lastname, firstname";
		
		$result = $this->db->query($sql)->result_array();
		
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
        if ($user)
        {
            try
            {
                $page_info = $facebook->api("/$page_id?fields=access_token");
                if( !empty($page_info['access_token']) )
                {
                    print_r($page_info['access_token']);
                    
                    $args = array(
                                'access_token'  => $page_info['access_token'],
                                'message'       => $message
                            );
                    $post_id = $facebook->api("/$page_id/feed","post",$args);
                }
                else
                {
                    $permissions = $facebook->api("/me/permissions");
                    if( !array_key_exists('publish_stream', $permissions['data'][0]) ||
                            !array_key_exists('manage_pages', $permissions['data'][0]))
                    {
                        // We don't have one of the permissions
                        // Alert the admin or ask for the permission!
                        header( "Location: " . $facebook->getLoginUrl(array("scope" => "publish_stream, manage_pages")) );
                    }
                }
            }
            catch (FacebookApiException $e)
            {
                error_log($e);
                $user = null;
            }
        }
          // Login or logout url will be needed depending on current user state.
        if ($user)
        {
            $logoutUrl = $facebook->getLogoutUrl();
        }
        else
        {
            $statusUrl = $facebook->getLoginStatusUrl();
            $loginUrl = $facebook->getLoginUrl();
            redirect($loginUrl);
        }
        // ... rest of your code
		
		
	}
	
}
