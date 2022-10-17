<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_user');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data = array(
            'title' => 'user',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'v_user',
    );
    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
         );
         $this->m_user->add($data);
         $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
         redirect('user');
         
    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Controllername.php */
