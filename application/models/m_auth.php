<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_auth extends CI_Model {

    public function login_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from('db_user');
        $this->db->where(array(
            'username' => $username,
            'password' => $password 
        ));
        return $this->db->get()->row();
    }

    public function login_pelanggan($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where(array(
            'email' => $email,
            'password' => $password 
        ));
        return $this->db->get()->row();
    }
}

/* End m_auth.php */
