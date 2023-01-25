<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJabatan extends CI_Model {

    function get_data($id)
    {
        $this->db->select("*");
        $this->db->from("data_jabatan");
        if(empty($id)) $this->db->order_by("nama_jabatan", "ASC");
        else $this->db->where("id_jabatan = '$id'");
        return $this->db->get()->result();
    }

    function save_data($data)
    {
      return $this->db->insert("data_jabatan", $data);
    }
}

