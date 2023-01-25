<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class PotonganGaji extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpotongan_gaji", "model", TRUE);
    }

    function service_get()
    {
        if (empty($this->input->get('id'))){
            $hasil = $this->model->get_data('');
            $number = sizeof($this->model->get_data(''));
            $this->response(array("potongan_gaji" => $hasil, "potongan_gaji_jumlah" => $number),200);
        } else {
            $this->response(array("potongan_gaji" => $this->model->get_data($this->input->get('id'))),200);
        }
    }
}