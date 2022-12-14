<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class Pegawai extends Server {

    //buat konstruktor
    public function __construct()
        {
                parent::__construct();
                 //panggil model "Mmahasiswa"
                $this->load->model("Ppegawai","model",TRUE);
        }

	//buat fungsi "GET"
    function service_get()
    {
       
        
        //panggil fungsi "get_data"
       $hasil = $this->model->get_data();

        $this->response(array("pegawai" =>
        $hasil),200);

    }

}
