<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataPegawai extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpegawai","model",TRUE);
    }


    function service_get()
    {
        if (empty($this->input->get('id'))){  
            $hasil = $this->model->get_data('');
            $admin = sizeof($this->model->get_data_admin());
            $number = sizeof($this->model->get_data(''));
            $this->response(array("pegawai" =>$hasil, "pegawai_jumlah" => $number, "admin_jumlah" => $admin),200);
        } else {
            $this->response(array("pegawai" => $this->model->get_data($this->input->get('id'))),200);
        }
    }

    function service_post()
    {
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

        $hasil = $this->model->save_data($data);
        if($hasil == 0 ) $this->response(array("pesan" => "true"),200);
        else $this->response(array("pesan" => "false"),200);
    }
}