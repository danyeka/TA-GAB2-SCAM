<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class Validation extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpegawai","model",TRUE);
        $this->load->model("Mgaji","gaji",TRUE);
    }

    function service_get()
    {
        $this->response(array('gaji' => $this->gaji->get_data_pegawai($this->get("nik"))) ,200);
    }

    function service_post()
    {
        $data = array(
            "username" => $this->post("username"),
            "password" => $this->post("password"),
       
        );

        $this->response($this->model->get_login($data) ,200);
    }
}