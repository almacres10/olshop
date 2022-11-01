<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class fotobarang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_fotobarang');
        $this->load->model('m_barang');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'foto barang',
            'fotobarang' => $this->m_fotobarang->get_all_data(),
            'isi' => 'fotobarang/v_fotobarang',
    );
    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    
    }

    public function add($id_barang)
    {
        $data = array(
            'title' => 'add gambar barang',
            'barang' => $this->m_barang->get_data($id_barang),
            'gambar' => $this->m_fotobarang->get_gambar($id_barang),
            'isi' => 'fotobarang/v_add',
    );
    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

}
