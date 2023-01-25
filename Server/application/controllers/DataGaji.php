<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/Server.php";

class DataGaji extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mgaji","model",TRUE);
    }

    function service_get()
    {
        $hasil = $this->model->get_data($this->get("bulantahun"));
        $number = sizeof($hasil);
        $this->response(array("gaji" => $hasil, "gaji_jumlah" => $number),200);
    }
    
}