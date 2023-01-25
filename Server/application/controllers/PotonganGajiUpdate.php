<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class PotonganGajiUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mpotongan_gaji", "model", TRUE);
    }

}