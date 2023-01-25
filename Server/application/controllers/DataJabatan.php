<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataJabatan extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mjabatan", "model", TRUE);
    }

    function service_get()
    {
        if (empty($this->input->get('id'))){
            $hasil = $this->model->get_data('');
            $number = sizeof($this->model->get_data(''));
            $this->response(array("jabatan" => $hasil, "jabatan_jumlah" => $number),200);
        } else {
            $this->response(array("jabatan" => $this->model->get_data($this->input->get('id'))),200);
        }
    }
}