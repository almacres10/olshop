<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class m_pelanggan extends CI_Model {

    public function register($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
        
    }

}

/* End of file m_pelanggan.php */
