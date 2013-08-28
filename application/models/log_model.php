<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Log_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table_name = strtolower('Log');

        if(!$this->db->table_exists($this->table_name))
        {
            $CI =& get_instance();
            $CI->load->dbforge();
            $CI->dbforge->add_key('id', TRUE);
            $fields = array(
                'id' => array(
                                    'type' => 'INT',
                                    'constraint' => 11,
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE
                                  ),
                'module' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '255',
                                  ),
                'type' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '255',
                                  ),
                'status' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '255',
                                  ),
                'message' => array(
                                    'type' => 'TEXT',
                                  ),
                'ip_address' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '255',
                                  ),
                'user_agent' => array(
                                    'type' => 'TEXT',
                                  ),
                'uid' => array(
                                    'type' => 'INT',
                                    'constraint' => 11,
                                    'unsigned' => TRUE,
                                  ),
                'time_created' => array(
                                    'type' => 'DATETIME',
                                  )
            );
            $CI->dbforge->add_field($fields);

            if ($CI->dbforge->create_table($this->table_name))
            {
                log_message('debug', ucfirst($this->table_name) . " Table Created.");
            }
        }
    }
    
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return TRUE;
    }
    
    function exists($val, $field_name='id')
    {
        $this->db->where($field_name, $val);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows() > 0) ? TRUE:FALSE;
    }
    
    function get_details($id='')
    {
        if($id)
        {
            $this->db->where('id', $id);
        }
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
/* End of file Booking.php */
/* Location: ./application/models/Log_model.php */