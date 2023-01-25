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

    function update_data($data, $id)
    {
        $where = array(
            'id_pegawai' => $id
        );
        return $this->db->update("data_pegawai", $data, $where);
    }

    function delete_data($id)
    {
        $where = array(
            'id_pegawai' => $id
        );

        $this->db->where($where);
        return $this->db->delete("data_pegawai");
    }

    function get_login($data)
    {
        $this->db->select("*");
        $this->db->from("data_pegawai");
        $this->db->where($data);
        $data = $this->db->get()->result();
        $login = sizeof($data);
        return array('login' => $login, 'hak_akses' => $data[0]->hak_akses, 'nama_pegawai' => $data[0]->nama_pegawai, 'photo' => $data[0]->photo, 'nik' => $data[0]->nik, 'id_pegawai' => $data[0]->id_pegawai);
    }
}

