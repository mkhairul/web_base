<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Authlib {
    
    var $error = '';
    var $_user_data = '';
    
    function Authlib()
    {
        $this->CI =& get_instance();
        
        // Load authentication data
        $this->CI->load->model('auth_model', 'auth');
        if($this->CI->auth->is_authenticated())
        {
            $this->uid = $this->CI->session->userdata('uid');
            $this->username = $this->CI->session->userdata('username');
            $this->superuser = $this->CI->session->userdata('superuser');
        }
    }
    
    public function register_authenticate($username='')
    {
        $this->username = $username;
        $this->CI->load->model('user_model', 'user', TRUE);
        if(!($this->_user_data = $this->CI->user->get_user($this->username)))
        {
            $this->error = 'Invalid username and/or password';
            return FALSE;
        }
        else
        {
            $this->_create_user_session();
            return TRUE;
        }
        return ($this->_user_data) ? TRUE:FALSE;
    }
    
    function _authenticate()
    {
        $this->CI->load->model('user_model', 'user', TRUE);
        if(!($this->_user_data == $this->CI->user->get_user($this->username)))
        {
            $this->error = 'Invalid username and/or password';
        }
        else
        {
            if(!$this->_check_password())
            {
                $this->error = 'Invalid username and/or password';
                return FALSE;
            }
        }
        return ($this->_user_data) ? TRUE:FALSE;
    }
    
    function _check_password()
    {
        return ($this->create_password($this->password) === $this->_user_data->password) ? TRUE:FALSE;
    }
    
    function create_password($password='')
    {
        $salt = substr($password,0,2);
        $this->CI->load->library('encrypt');
        $password = $this->CI->encrypt->sha1($password . $salt);

        return $password;
    }
    
    function _create_user_session()
    {
        $this->CI->session->set_userdata(
            array(
                'username' => $this->_user_data->username,
                'fullname' => $this->_user_data->fullname,
                'uid' => $this->_user_data->id,
            )
        );
    }

    function login()
    {
        if($this->_retrieve_login_posts())
        {
            if($this->_authenticate())
            {
                $this->_create_user_session();
                return TRUE;
            }
        }
        return FALSE;
    }
    
    function check_logged_in($exception=0)
    {
        $CI =& get_instance();
        if(getstr($_POST['session_id']))
        {
            // Get the session's data
            $CI->db->where('session_id', $_POST['session_id']);
            $query = $CI->db->get('ci_sessions');
            $tmp = $query->row();
            if(getstr($tmp))
            {
                $userdata = $tmp->user_data;
            }
            $userdata = unserialize($userdata);
            if(!getstr($userdata['username']))
            {
                redirect('login');
            }
            
        }
        else
        {
            $segment = $CI->uri->segment_array();
            if($segment[count($segment)] !== $exception)
            {
                $CI->load->model('auth_model', 'auth');
                if(!$CI->auth->is_authenticated()){ redirect('login'); }
            }
        }
    }
    
    function get_id()
    {
        $CI =& get_instance();
        return $this->CI->session->userdata('uid');
    }
    
    function get_username()
    {
        $CI =& get_instance();
        return $this->CI->session->userdata('username');
    }
    
    function superuser_only($exception=0)
    {
        $CI =& get_instance();
        if(getstr($_POST['session_id']))
        {
            // Get the session's data
            $CI->db->where('session_id', $_POST['session_id']);
            $query = $CI->db->get('ci_sessions');
            $tmp = $query->row();
            if(getstr($tmp))
            {
                $userdata = $tmp->user_data;
            }
            $userdata = unserialize($userdata);
            if($userdata['superuser'] != 1)
            {
                redirect('admin/main');
            }
            if(!getstr($userdata['username']))
            {
                redirect('admin/login');
            }
            
        }
        else
        {
            if(!is_array($exception))
            {
                $exception = array($exception);
            }
            if(!in_array($CI->uri->segment(3,FALSE),$exception))
            {
                $CI->load->model('auth_model', 'auth');
                if(!$CI->auth->is_admin()){ redirect('admin/main'); }
            }
            
        }
    }
    
    function _retrieve_login_posts()
    {
        $this->username = $this->CI->input->post('username');
        $this->password = $this->CI->input->post('password');
        if(!$this->username or !$this->password)
        {
            $this->error = 'Please insert a username and/or password';
        }
        return ($this->error) ? FALSE:TRUE;
    }
}
?>