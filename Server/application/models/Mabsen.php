<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mabsen extends CI_Model {

    function get_data($bulantahun)
    {
        return $this->db->query("SELECT data_kehadiran.*, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan FROM data_kehadiran INNER JOIN data_pegawai ON data_kehadiran.nik = data_pegawai.nik INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan WHERE data_kehadiran.bulan = '$bulantahun' ORDER BY data_pegawai.nama_pegawai ASC")->result();
    }
    
    
}

