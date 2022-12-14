<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppegawai extends CI_Model {

	// buat method untuk tampil data
    function get_data()
    {
        //mengambil hanya npm
        //$this->db->select("npm")

        $this->db->select("id_pegawai AS id_pgw,
        nik AS nik_pgw,
        nama_pegawai AS nama_pgw,
        jenis_kelamin AS jns_klmn,
        jabatan AS jabatan_pgw,
        tanggal_masuk AS tgl_msk,
        status AS status_pgw,
        photo AS photo_pgw,
        ");

        $this->db->from("data_pegawai");
        $this->db->order_by("nik","ASC");

        $query = $this->db->get()->result();
        return $query;

    }


}

