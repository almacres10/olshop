<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('db_user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
        
        
        
        
    }

    public function add($data)
    {
        $this->db->insert('db_user', $data);
        
    }

}

/* End of file ModelName.php */
