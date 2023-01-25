<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class PotonganGajiUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpotongan_gaji", "model", TRUE);
    }

    function service_get()
    {
        if($this->model->delete_data($this->input->get('id')) == 0) {
            $this->response(array("pesan" => "true", 'id' => $this->input->get('id')),200);
        } else {
            $this->response(array("pesan" => "false", 'id' => $this->input->get('id')),200);
        }
    }

    function service_post()
    {
        $data = array(
            'potongan' => $this->input->post('jenis_potongan'),
            'jml_potongan' => $this->input->post('jumlah_potongan')
        );

        $hasil = $this->model->update_data($this->input->post('id'), $data);
        
        if($hasil == 0) {
            $this->response(array("pesan" => "true"),200);
        } else {
            $this->response(array("pesan" => "false"),200);
        }
    }
}