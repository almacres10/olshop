<?php

defined('BASEPATH') or exit('No direct script access allowed');

class fotobarang extends CI_Controller
{


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

        $this->form_validation->set_rules('ket', 'ket gambar', 'required', array('required' => '%s Harus diisi'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/fotogambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'add gambar barang',
                    'error_upload' => $this->upload->display_errors(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'gambar' => $this->m_fotobarang->get_gambar($id_barang),
                    'isi' => 'fotobarang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/fotogambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'ket' => $this->input->post('ket'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_fotobarang->add($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan');
                redirect('fotobarang/add/' . $id_barang);
            }
        }

        $data = array(
            'title' => 'add gambar barang',
            'barang' => $this->m_barang->get_data($id_barang),
            'gambar' => $this->m_fotobarang->get_gambar($id_barang),
            'isi' => 'fotobarang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_barang, $id_gambar)
    {
        // hapus gambar
        $gambar = $this->m_fotobarang->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/fotogambar/' . $gambar->gambar);
        }

        //end hapus
        $data = array('id_gambar' => $id_gambar);
        $this->m_fotobarang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('fotobarang/add/'.$id_barang);
    }
}
