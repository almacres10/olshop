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

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('db_user', $data  );
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('db_user', $data  );
    }

}

/* End of file ModelName.php */
