<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_fotobarang extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('tbl_barang.*, count(tbl_barang.id_barang) as total_gambar');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_fotogambar', 'tbl_fotogambar.id_barang = tbl_barang.id_barang', 'left');
        $this->db->group_by('tbl_barang.id_barang');
        $this->db->order_by('tbl_barang.id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_gambar){
        $this->db->select('*');
        $this->db->from('tbl_fotogambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();
    }

    public function get_gambar($id_barang){
        $this->db->select('*');
        $this->db->from('tbl_fotogambar');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->result();
    }

    public function add($data)
    { 
        $this->db->insert('tbl_fotogambar ', $data);  
    }

    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tbl_fotogambar', $data  );
    }
}