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

    function service_post()
    {
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan'),
            'gaji_pokok' => $this->input->post('gaji_pokok'),
            'tj_transport' => $this->input->post('tj_transport'),
            'uang_makan' => $this->input->post('uang_makan')
        );

        $hasil = $this->model->update_data($this->input->post('id_jabatan'), $data);
        
        if($hasil == 0) {
            $this->response(array("pesan" => "true"),200);
        } else {
            $this->response(array("pesan" => "false"),200);
        }
    }
}