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

    function service_post()
    {
        $data = array(
            'potongan' => $this->input->post('jenis_potongan'),
            'jml_potongan' => $this->input->post('jumlah_potongan')
        );

        $hasil = $this->model->save_data($data);
        
        if($hasil == 0) {
            $this->response(array("pesan" => "true"),200);
        } else {
            $this->response(array("pesan" => "false"),200);
        }
    }
}