<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');

    }


    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Harus diisi'));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', 
        array('required' => '%s Harus diisi',
        'is_unique' => '%s sudah terdaftar'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus diisi'));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', 
        array('required' => '%s Harus diisi',
        'matches' => '%s tidak sama' ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Akun berhasil dibuat, silakan login');
            redirect('pelanggan/register');
        }
        
    }
    public function login()
    {
        $this->form_validation->set_rules('email','Email','required',array(
            'required' => '%s Harus diisi !!'
        ));

        $this->form_validation->set_rules('password','Password','required',array(
            'required' => '%s Harus diisi !!'
        ));

        
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'isi' => 'v_akun_saya',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}