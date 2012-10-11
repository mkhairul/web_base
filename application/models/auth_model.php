<?php
class Auth_model extends CI_Model {

    function Auth_model()
    {
        parent::__construct();
        $this->error = '';
        
        /*if(!$this->db->table_exists('ci_sessions'))
        {
            $CI =& get_instance();
            $CI->load->dbforge();
            $CI->dbforge->add_key('session_id', TRUE);
            $fields = array(
                'session_id' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '40',
                                    'default' => '0',
                                    'null' => FALSE
                                  ),
                'ip_address' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '16',
                                    'default' => '0',
                                    'null' => FALSE
                                  ),
                'user_agent' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '50',
                                    'null' => FALSE,
                                  ),
                'last_activity' => array(
                                    'type' =>'INT',
                                    'constraint' => 10,
                                    'null' => FALSE,
                                    'unsigned' => TRUE,
                                    'default' => '0',
                                  ),
                'user_data' => array(
                                    'type' => 'TEXT',
                                    'null' => FALSE,
                                  )
            );
            $CI->dbforge->add_field($fields);
            
            if ($CI->dbforge->create_table('ci_sessions'))
            {
                log_message('debug', "Session Table Created");
            }
        }*/
    }
    
    function authenticate( $username=null, $password=null )
    {
        if(!$username or !$password)
        {
            $this->error = 'Please insert a username and/or password.';
            return FALSE;
        }
        
        $this->status	= FALSE;
        $this->username	= $username;
        $this->password	= $password;

        $this->db->where(array('username' 	=> $this->username));
        $query = $this->db->get('user');
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            if(((int)$row->active) !== 0)
            {
                $salt = substr($this->password,0,2);
                $this->load->library('encrypt');
                if ( $this->encrypt->sha1($this->password . $salt) == $row->password )
                {
                    $this->status 	= TRUE;
                    $this->user_id 	= $row->id;
                    $this->gid		= $row->group_id;
                    $this->fullname = $row->fullname;
                }else{
                    $this->status = FALSE;
                    $this->error = 'Username and password does not match';
                }
            }
            else
            {
                $this->error = 'Account activation still pending. Please click on the link sent to your email.';
                $this->status = FALSE;
            }
        }
        else
        {
            $this->error = 'Incorrect Username or Password.';
        }

        //$this->db->_close();
        return $this->status;
    }
    
    function check($page='login')
    {
        if(!$this->is_authenticated())
        {
            redirect($page);
        }
    }
    
    function check_admin()
    {
        
    }
    
    function create_password($password='')
    {
        $salt = substr($password,0,2);
        $this->load->library('encrypt');
        $password = $this->encrypt->sha1($password . $salt);

        return $password;
    }
    
    function get_id()
    {
        return $this->session->userdata('uid');
    }
    
    function is_authenticated()
    {
        $status = $this->session->userdata('username');
        return (!empty($status)) ? TRUE : FALSE;
    }
    
    function is_admin()
    {
        $status = $this->session->userdata('superuser');
        return (!empty($status)) ? TRUE : FALSE;
    }
    
    function login($username='',$password='')
    {
        $username = ($username) ? $username : $this->input->post('username', true);
        $password = ($password) ? $password : $this->input->post('password', true);
        log_message('debug', "Username: $username and Password: $password received");

        if ( $this->authenticate($username, $password) )
        {
            log_message('debug', "User is successfully authenticated.");
            $name = $this->fullname;
            $this->session->set_userdata(
                array(
                    'username' 	=> $username,
                    'name'	=> $name,
                    'user_id'	=> $this->user_id,
                    'gid'		=> $this->gid,
                ));
            return true;
        }
        else
        {
            log_message('debug', "User failed authentication.");
            return false;
        }
    }
    
    function logout($page)
    {
        $this->session->sess_destroy();
        redirect($page);
    }
    
    function permission($permission_name)
    {
        $gid = $this->session->userdata('gid');
        $CI =& get_instance();
        $CI->load->model('group_model', 'group');
        $group_name = $CI->group->get_name($gid);
        if(strtolower($group_name) == strtolower($permission_name))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/*
 TABLE
 
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL default '',
  `last_activity` int(10) unsigned NOT NULL default '0',
  `session_data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) TYPE=MyISAM;

*/
?>