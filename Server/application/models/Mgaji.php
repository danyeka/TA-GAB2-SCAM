<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgaji extends CI_Model {

    function get_data($bulantahun)
    {
        return $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_kehadiran.bulan='$bulantahun' ORDER BY data_pegawai.nama_pegawai ASC")->result();
    }

    function save_data($data)
    {
      return $this->db->insert("potongan_gaji", $data);
    }
}

