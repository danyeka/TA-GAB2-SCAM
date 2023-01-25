<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mabsen extends CI_Model {

    function get_data($bulantahun)
    {
        return $this->db->query("SELECT data_kehadiran.*, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan FROM data_kehadiran INNER JOIN data_pegawai ON data_kehadiran.nik = data_pegawai.nik INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan WHERE data_kehadiran.bulan = '$bulantahun' ORDER BY data_pegawai.nama_pegawai ASC")->result();
    }

    // buat fungsi untuk simpan data
    function save_data($nik,$nama_pegawai,$jenis_kelamin,$jabatan,$tanggal_masuk,$status,$photo,$token)
    {
       // cek apakah nik ada/tidak
       $this->db->select("nik");
       $this->db->from("data_pegawai");
       $this->db->where("TO_BASE64(nik) = '$token'");
       //eksekusi query
       $query = $this->db->get()->result();
       //jika nik ditemukan
       if(count($query) == 0)
       {
         // isi nilai untuk masing2 field
         $data = array(
            "nik" => $nik,
            "nama_pegawai" => $nama_pegawai,
            "jenis_kelamin" => $jenis_kelamin,
            "jabatan" => $jabatan,
            "tanggal_masuk" => $tanggal_masuk,
            "status" => $status,
            "photo" => $photo,
         );
         // simpan data
         $this->db->insert("data_pegawai",$data);
         $hasil= 0;

       }
      // jika nik ditemukan
      else
      {
        $hasil = 1;
      }
      return $hasil;
    }

    
    
}

