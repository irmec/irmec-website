<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Carey Dayrit carey.dayrit@gmail.com
*/

class Announcements extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        /*
        if (!$this->ion_auth->logged_in())
        {
        	//redirect them to the login page
        	redirect($this->config->item('base_url').'auth/login');
        }
        */
    }

    public function index()
    {

        //initialize variables
        $data = array();

        //initialize models
        $this->load->model('announcement_model');
        $keyword = $this->input->get('keyword') ? trim($this->input->get('keyword')) : null;
        if(!empty($keyword))
        {
            $data['announcements'] = $this->announcement_model->findAll("title like '%{$keyword}%'");

        }
        else
        {
            $data['announcements'] = $this->announcement_model->findAll();
        }

        $data['content'] = $this->load->view('admin/announcements/index', $data, true);
        $this->render('admin', $data);

    }

    /**
    add

    */

    public function add()
    {
        $this->form_validation->set_rules('message', 'Message', 'required');
        //towns
        $this->load->helper('form');
        $data = array();

        if($this->form_validation->run() === true)
        {


            $params = array(
                          'message' => $this->input->post('message'),
                          'sms' => $this->input->post('sms'),
                          'fb' => $this->input->post('fb'),
                          'twitter'=> $this->input->post('twitter'),
                          'insertedon'=>date('Y-m-d', time())
                      );



            if(!empty($_FILES['photo']['name']))
            {
                //set the configuration for file upload
                $upload_config['upload_path'] = './images/announcements/';
                $upload_config['allowed_types'] = 'gif|jpg|png';
                $upload_config['max_size'] = '0';
                $upload_config['max_width'] = '1024';
                $upload_config['max_height'] = '768';
                $upload_config['file_name'] = time();
                //load upload library and initialize defaults
                $this->load->library('upload', $upload_config);

                if (!$this->upload->do_upload('photo'))
                {
                    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                    redirect(base_url().'admin/announcements/add');
                }
                $upload_data = $this->upload->data();

                $params['photo'] = $upload_data['file_name'];
            }

            $this->load->model('announcement_model');
            $this->announcement_model->save($params);

            $this->session->set_flashdata('message','The record has been added');
            redirect(base_url().'admin/announcements/index');
        }


        $data['content'] = $this->load->view('admin/announcements/add', $data, true);
        $this->render('admin', $data);

    }
    
    /** Edit Church **/
    
    public function edit($id=null)
    {
        //initialize variables
        $data=array();

        //load models here
        $this->load->model('announcement_model');



        $announcements = $this->announcement_model->find("id=$id");

         $this->form_validation->set_rules('message', 'Message', 'required');

        //validate here
        if($this->form_validation->run() === true)
        {

            $params = array(
                          'message' => $this->input->post('message'),
                          'sms' => $this->input->post('sms'),
                          'fb' => $this->input->post('fb'),
                          'twitter'=> $this->input->post('twitter'),
                          'insertedon'=>date('Y-m-d', time())
                      );

            //insert photo here

            //check if we have a photo
            if(!empty($_FILES['file']['name']))
            {
                //set the configuration for file upload
                $upload_config['upload_path'] = './downloads/';
                $upload_config['allowed_types'] = 'pdf';
                $upload_config['max_size'] = '0';
                $upload_config['max_width'] = '2048';
                $upload_config['max_height'] = '1536';
                $upload_config['file_name'] = time();
                //load upload library and initialize defaults
                $this->load->library('upload', $upload_config);

                //remove old image
                @unlink($upload_config['upload_path'].$announcements['file']);

                if (!$this->upload->do_upload('file'))
                {
                    $this->session->set_flashdata('error',$this->upload->display_errors());//this returns an array
                    redirect(base_url().'admin/annoucements/edit/'.$announcements['id']);
                }
                $upload_data = $this->upload->data();

                $params['file'] = $upload_data['file_name'];
            }

            $this-> {$this->model}->save($params, $id);
            //put a flash message
            $this->session->set_flashdata('message','The record has been updated');
            redirect(base_url().'admin/annoucements');


        }


       
        $data['content'] = $this->load->view('admin/announcements/edit', $data, true);
        $this->render('admin', $data);


    }

    /** Remove Church **/

    public function remove($id)
    {
        $this->load->model('announcement_model');

        $this->announcement_model->remove($id);

        $this->session->set_flashdata('message','The record has been removed');
        redirect(base_url().'admin/announcements');
    }

    public function postFacebookStatus()
    {
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        require('application/libraries/facebook/facebook.php');


        $page_id = FB_PAGE_ID;
        $message = "Message post test, integration website->facebook->twitter";


        // Create our Application instance (replace this with your appId and secret).
        $facebook = new Facebook(array(
                                     'appId'  => FB_APP_ID,
                                     'secret' => FB_APP_SECRET
                                 ));


        // Get User ID
        $user = $facebook->getUser();



        if ($user)
        {
            try
            {
                $page_info = $facebook->api("/$page_id?fields=access_token");
                if( !empty($page_info['access_token']) )
                {
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
