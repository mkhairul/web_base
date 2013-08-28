<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Log {
    
    protected $ci;
    protected $auth;
    protected $log_m;
    
    function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('Authlib');
        $this->auth = $this->ci->auth;
        
        $this->ci->load->model('log_model', 'log_m');
        $this->log_m = $this->ci->log_m;
    }
    
    function info($module, $type, $message)
    {
        $data = array(
            'module' => $module,
            'type' => $type,
            'message' => $message,
            'status' => 'info',
            'ip_address' => $this->ci->input->ip_address(),
            'user_agent' => $this->ci->input->user_agent(),
            'uid' => $this->auth->get_id(),
            'time_created' => date('Y-m-d h:i:s', strtotime('now'))
        );
        $this->log_m->insert($data);
    }
    
    function success($module, $type, $message)
    {
        $data = array(
            'module' => $module,
            'type' => $type,
            'message' => $message,
            'status' => 'success',
            'ip_address' => $this->ci->input->ip_address(),
            'user_agent' => $this->ci->input->user_agent(),
            'uid' => $this->auth->get_id(),
            'time_created' => date('Y-m-d h:i:s', strtotime('now'))
        );
        $this->log_m->insert($data);
    }
    
    function error($module, $type, $message)
    {
        $data = array(
            'module' => $module,
            'type' => $type,
            'message' => $message,
            'status' => 'error',
            'ip_address' => $this->ci->input->ip_address(),
            'user_agent' => $this->ci->input->user_agent(),
            'uid' => $this->auth->get_id(),
            'time_created' => date('Y-m-d h:i:s', strtotime('now'))
        );
        $this->log_m->insert($data);
    }
}