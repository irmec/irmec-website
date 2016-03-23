<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Carey Dayrit carey@irmevangelicalchurch.org
*/


class MY_Controller extends CI_Controller{
    protected $sections = array();
    protected $additional_js = array();
    protected $additional_css = array();
    protected $title = '';
    protected $short_title = '';
    protected $active_nav = '';
    protected $fbmeta_data=array();

	public function __construct() {
		parent::__construct();
		//$this->authRedirect();

		$sections = array(
			'active_nav'    => $this->title,
			'title'         => $this->title,
			'short_title'   => $this->title,
			'content'       => null,
            'additional_js' => null,
            'additional_css'=> null,
		);




		$this->sections = $sections;
	}
    public function render($template_name, $sections = array(), $return = false) {
        $sections['active_nav'] = $this->active_nav;
        $sections['title'] = $this->title;
        $sections['short_title'] = $this->short_title;
		$sections = array_merge($this->sections,$sections);
        $sections['js'] = $this->additional_js;
        $sections['css'] = $this->additional_css;
        $sections['fbmeta_data'] =$this->fbmeta_data;
        if($this->ion_auth->logged_in()){
            $sections['logged'] = true;
        }else{
            $sections['logged'] = false;
        }


		return $this->load->view('layouts/'.$template_name, $sections, $return);
	}

    public function set_title($title, $short_title = null) {
        $this->title = $title;
        $this->short_title = $title;
        if($short_title != null) {
            $this->short_title = $short_title;
        }
    }
    public function add_css($css, $no_cache=false) {
        if($no_cache) {
            $this->additional_css[] = $css.".css?".time();
        } else {
            $this->additional_css[] = $css.".css";
        }
    }
    public function add_js($js, $cache=true) {
        if($cache) {
            $this->additional_js[] = $js.".js";
        } else {
            $this->additional_js[] = $js.".js?".time();
        }
    }

     public function get_active_nav() {
        return $this->active_nav;
    }
    public function set_active_nav($nav) {
        $this->active_nav = strtolower($nav);
    }

    #this will not do anything without a meta
    public function set_fbmeta($meta=null){
        if(!empty($meta)){
            $this->fbmeta_data = $meta;
        }
    }


}




