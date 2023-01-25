<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataJabatanUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mjabatan", "model", TRUE);
    }

    function service_get()
    {
        if($this->model->delete_data($this->input->get('id_jabatan')) == 0) {
            $this->response(array("pesan" => "true"),200);
        } else {
            $this->response(array("pesan" => "false"),200);
        }
    }
}