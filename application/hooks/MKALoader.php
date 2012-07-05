<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MKALoader{
    
    function __construct()
    {
        $this->CI =& get_instance();
        $data = array();
        
        $base_url = $this->CI->config->item('base_url');
        $data['path_js'] = $base_url . $this->CI->config->item('js');
        $data['path_css'] = $base_url . $this->CI->config->item('css');
        $data['path_images'] = $base_url . $this->CI->config->item('images');
        $data['path_theme'] = $base_url . $this->CI->config->item('theme');
		$data['title'] = $this->CI->config->item('title');
        
		if(isset($this->CI->session))
		{
			// Retrieve any flashdata messages
			$data['misc_error'] = $this->CI->session->flashdata('misc_error');
			$data['misc_success'] = $this->CI->session->flashdata('misc_success');
		}
        
        $this->CI->data = $data;
    }
    
}