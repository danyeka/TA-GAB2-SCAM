<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpegawai extends CI_Model {

    function get_data($id)
    {
        $this->db->select("*");
        $this->db->from("data_pegawai");
        if(empty($id)) $this->db->order_by("nama_pegawai", "ASC");
        else $this->db->where("id_pegawai = '$id'");
        return $this->db->get()->result();
    }

    function get_data_admin()
    {
        $this->db->select("*");
        $this->db->from("data_pegawai");
        $this->db->where("jabatan = 'Admin'");
        $this->db->order_by("nama_pegawai", "ASC");
        return $this->db->get()->result();
    }

    function save_data($data)
    {
      return $this->db->insert("data_pegawai", $data);
    }
}

