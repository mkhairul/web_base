<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

    function User_model()
    {
        parent::__construct();
        $this->table_name = strtolower('Users');

        $CI =& get_instance();
        // Create the basic user table
        /*if(!$this->db->table_exists($this->table_name))
        {
            $CI->load->dbforge();
            $CI->dbforge->add_key('id', TRUE);
            $fields = array(
                'id' => array(
                                    'type' => 'INT',
                                    'constraint' => 11,
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE
                                  ),
                'username' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '255',
                                    'null' => FALSE,
                                  ),
                'password' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '50',
                                    'null' => FALSE,
                                  ),
                'fullname' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '150',
                                    'null' => FALSE,
                                  ),
                'status' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '150',
                                    'null' => FALSE,
                                    'default' => 'pending'
                                  ),
                'active' => array(
                                    'type' => 'TINYINT',
                                    'constraint' => 1,
                                    'null' => FALSE,
                                    'default' => '1'
                                  ),
                'timecreated' => array(
                                    'type' => 'INT',
                                    'constraint' => 11,
                                    'null' => FALSE,
                                  )

            );
            $CI->dbforge->add_field($fields);

            if ($CI->dbforge->create_table($this->table_name))
            {
                log_message('debug', ucfirst($this->table_name) . " Table Created.");
            }
        }*/
        
        if($this->db->count_all($this->table_name) == 0)
        {
            $CI->load->library('Authlib');
            $timestamp = strtotime('now');
            $data = array(
                'username' => 'user1',
                'password' => $CI->authlib->create_password('qwe123'),
                'fullname' => 'User bin One',
                'timecreated' => $timestamp
            );
            $this->insert($data);
            
            $data = array(
                'username' => 'user2',
                'password' => $CI->authlib->create_password('qwe123'),
                'fullname' => 'User bin Two',
                'timecreated' => $timestamp
            );
            $this->insert($data);
        }
    }
    
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return TRUE;
    }
    
    function get_user($username)
    {
        $this->db->like('username', $username);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows() > 0) ? $query->row():FALSE;
    }

    function get_list()
    {
        $query = $this->db->get($this->table_name);
        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }
    
    function get_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows() > 0) ? $query->row():FALSE;
    }

    function get_name($id)
    {
        if(!$id){ return FALSE; }

        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result->name;
        }
        else
        {
            return FALSE;
        }
    }

    function insert($data)
    {
        $this->db->set($data);
        $this->db->insert($this->table_name);

        return $this->db->insert_id();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update($this->table_name);
    }
}
?>