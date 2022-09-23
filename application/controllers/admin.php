<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'admin',
            'isi' => 'v_admin',
    );
    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    
    }

}

/* End of file Home.php */