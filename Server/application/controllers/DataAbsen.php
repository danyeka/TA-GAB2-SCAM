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
    
}