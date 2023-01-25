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
}