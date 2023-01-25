<?php

class DataGaji extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda belum login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect("/");
        }
    }
    
    public function index()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantaun = $bulan . $tahun;

        if(!empty($this->input->get('bulan')) && !empty($this->input->get('bulan'))) $send = array('bulantahun' => $this->input->get('bulan') . $this->input->get('tahun'));
        else $send = array('bulantahun' => $bulantaun);

        $potonganGaji = json_decode($this->client->simple_get(API_POTONGAN_GAJI, $send));
        $data['potongan_gaji'] = $potonganGaji->potongan_gaji[0]->jml_potongan;

        $data['title'] = "Data Gaji Pegawai";
        $gaji = json_decode($this->client->simple_get(API_DATA_GAJI, $send));
        $data['gaji'] = $gaji->gaji;

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_gaji',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>