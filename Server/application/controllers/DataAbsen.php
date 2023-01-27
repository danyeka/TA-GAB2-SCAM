<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataAbsen extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mabsen","model",TRUE);
    }

    function service_get()
    {
        $hasil = $this->model->get_data($this->get("bulantahun"));
        $number = sizeof($hasil);
        $this->response(array("absen" => $hasil, "kehadiran_jumlah" => $number),200);
    }
    
    function service_post()
    {
       
        //ambil parameter token data yang akan diisi
        $data = array(
            "nik" => $this->post("nik"),
            "nama_pegawai" => $this->post("nama_pegawai"),
            "jenis_kelamin" => $this->post("jenis_kelamin"),
            "jabatan" => $this->post("jabatan"),
            "tanggal_masuk" => $this->post("tanggal_masuk"),
            "status" => $this->post("status"),
            "photo" => $this->post("photo"),
            "token" => base64_encode($this->post("token")),
        );
    
        // panggil method "save data"
        $hasil = $this->model->save_data($data["nik"],
        $data["nama_pegawai"],$data["jenis_kelamin"],$data["jabatan"],$data["tanggal_masuk"],$data["status"],
        $data["photo"],$data["token"]);
        // jika hasil = 0
        if($hasil == 0 )
        {
            $this->response(array("status" =>"Data Pegawai Berhasil Disimpan"),200);
        }
        // jika hasil != 0
        else
        {
            $this->response(array("status" =>"Data Pegawai  Gagal Disimpan !"),200);
        }



}
}