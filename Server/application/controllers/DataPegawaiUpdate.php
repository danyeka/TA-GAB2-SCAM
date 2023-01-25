<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataPegawaiUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpegawai","model",TRUE);
    }


    function service_get()
    {
        if($this->model->delete_data($this->input->get('id_pegawai')) == 0) {
            $this->response(array("pesan" => "true"),200);
        } else {
            $this->response(array("pesan" => "false"),200);
        }
    }

    function service_post()
    {
        if (empty($this->post("photo"))){
            $data = array(
            "nik" => $this->post("nik"),
            "nama_pegawai" => $this->post("nama_pegawai"),
            "jenis_kelamin" => $this->post("jenis_kelamin"),
            "jabatan" => $this->post("jabatan"),
            "tanggal_masuk" => $this->post("tanggal_masuk"),
            "hak_akses" => $this->post("hak_akses"),
            "status" => $this->post("status")
            );
        } else {
            $data = array(
            "nik" => $this->post("nik"),
            "nama_pegawai" => $this->post("nama_pegawai"),
            "jenis_kelamin" => $this->post("jenis_kelamin"),
            "jabatan" => $this->post("jabatan"),
            "tanggal_masuk" => $this->post("tanggal_masuk"),
            "status" => $this->post("status"),
            "hak_akses" => $this->post("hak_akses"),
            "photo" => $this->post("photo")
            );
        }

        $hasil = $this->model->update_data($data, $this->post("id_pegawai"));
        if($hasil == 0 ) $this->response(array("pesan" => "true"),200);
        else $this->response(array("pesan" => "false"),200);
    }
}