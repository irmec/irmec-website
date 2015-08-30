<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @author Carey Dayrit carey.dayrit@gmail.com
 */
class Pub extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('contact_us');
    }

    public function index() {
        $data['content'] = $this->load->view('home/index', null, true);
        $this->render('landing', $data);
    }

    public function history() {
        $data = array();
        $data['content'] = $this->load->view('pub/history', $data, true);
        $this->render('landing', $data);
    }

    public function contact() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[32]');
        $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[50]');
        $this->form_validation->set_rules('message', 'Message','required');
        $this->form_validation->set_rules('captcha_code', 'Captcha', 'callback_captcha_code_check');

        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

         

        if ($this->form_validation->run() == FALSE) { // validation hasn't been passed
            $data['content'] = $this->load->view('pub/contact', null, true);
            $this->render('landing', $data);

        } else {

                 $form_data = array(
                'email' => set_value('email'),
                'subject' => set_value('subject'),
                'message' => set_value('message'),
               
            );
            
                $headers = "From: <". $form_data['email'] . ">" ;

                // run insert model to write data to db

                if ($this->contact_us->SaveForm($form_data) == TRUE) {
                    mail('irmec92@gmail.com', $form_data['subject'], $form_data['message'], $headers);
                    
                    redirect('pub/success');
            } else {
                echo 'An error occurred saving your information. Please try again later';

               }

                
                // Or whatever error handling is necessary
            }
        }

    public function captcha_code_check($str)
	{
	if ($str != $this->session->userdata('captcha_code'))
	{
		$this->form_validation->set_message('captcha_code_check', 'The %s don"t match, Try again' );
		return FALSE;
	}
	else
	{
		return TRUE;
	}
	}
    

    public function about()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/about', null, true);
        $this->render('landing', $data);
    }

    public function success()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/contact-success', null, true);
        $this->render('landing', $data);
    }

    public function foreign()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/foreign', $data, true);
        $this->render('landing', $data);
    }

    public function council()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/council', $data, true);
        $this->render('landing', $data);
    }



    public function workers()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/churches', $data, true);
        $this->render('landing', $data);
    }


    public function workers_profile()
    {
        $data = array();
        $data['content'] = $this->load->view('pub/workers_profile', $data, true);
        $this->render('landing', $data);
    }

    public function resource($id)
    {
        $this->load->model('download_model');

        $data = array();

        $data['resource'] = $this->download_model->find('id='.$id);

        $this->fbmeta_data = array(
          'title'=>$data['resource']['name'],
          'description'=>$data['resource']['description'],
          'url'=>base_url().'pub/resource/'.$id
        );


        $data['content'] = $this->load->view('pub/resource', $data, true);
        $this->render('landing', $data);
    }

    public function resources()
    {
        $this->load->model('download_model');

        $data = array();

        $data['resources'] = $this->download_model->findAll(null, '*', 'createdon DESC' );

        $data['content'] = $this->load->view('pub/resources', $data, true);
        $this->render('landing', $data);
    }
    
    /**
     * 
     */
    
    public function show_captcha( $rand=0 )
    {
		//Settings: You can customize the captcha here
		$image_width = 120;
		$image_height = 40;
		$characters_on_image = 6;
		$font = './css/fonts/monofont.ttf';
		
		//The characters that can be used in the CAPTCHA code.
		//avoid confusing characters (l 1 and i for example)
		$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
		$random_dots = 0;
		$random_lines = 20;
		$captcha_text_color="0x142864";
		$captcha_noice_color = "0x142864";
		
		$code = '';
		
		
		$i = 0;
		while ($i < $characters_on_image)
		{
		    $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
		    $i++;
		}
		
		
		$font_size = $image_height * 0.75;
		$image = @imagecreate($image_width, $image_height);
		
		
		/* setting the background, text and noise colours here */
		$background_color = imagecolorallocate($image, 255, 255, 255);
		
		$arr_text_color = $this->_hexrgb($captcha_text_color);
		$text_color = imagecolorallocate($image, $arr_text_color['red'],
		                                 $arr_text_color['green'], $arr_text_color['blue']);
		
		$arr_noice_color = $this->_hexrgb($captcha_noice_color);
		$image_noise_color = imagecolorallocate($image, $arr_noice_color['red'],
		                                        $arr_noice_color['green'], $arr_noice_color['blue']);
		
		
		/* generating the dots randomly in background */
		for( $i=0; $i<$random_dots; $i++ )
		{
		    imagefilledellipse($image, mt_rand(0,$image_width),
		                       mt_rand(0,$image_height), 2, 3, $image_noise_color);
		}
		
		
		/* generating lines randomly in background of image */
		for( $i=0; $i<$random_lines; $i++ )
		{
		    imageline($image, mt_rand(0,$image_width), mt_rand(0,$image_height),
		              mt_rand(0,$image_width), mt_rand(0,$image_height), $image_noise_color);
		}
		
		
		/* create a text box and add 6 letters code in it */
		$textbox = imagettfbbox($font_size, 0, $font, $code);
		$x = ($image_width - $textbox[4])/2;
		$y = ($image_height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);
		
		
		/* Show captcha image in the page html page */
		header('Content-Type: image/jpeg');// defining the image type to be shown in browser widow
		imagejpeg($image);//showing the image
		imagedestroy($image);//destroying the image instance
		$this->session->set_userdata('captcha_code', $code);
			
				
	}
	
	private function _hexrgb($hexstr)
	{
	
	    $int = hexdec($hexstr);
	
	    return array("red" => 0xFF & ($int >> 0x10),
	                 "green" => 0xFF & ($int >> 0x8),
	                 "blue" => 0xFF & $int);
		
	}



}
