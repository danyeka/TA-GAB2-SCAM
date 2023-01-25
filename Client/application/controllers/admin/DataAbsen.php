<?php

class DataAbsen extends CI_Controller{
    
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

        if (empty($this->input->get('bulan'))) $send = array('bulantahun' => $bulan . $this->input->get('tahun'));
        else if (empty($this->input->get('tahun'))) $send = array('bulantahun' => $this->input->get('bulan') . $tahun);
        else if(!empty($this->input->get('bulan')) && !empty($this->input->get('bulan'))) $send = array('bulantahun' => $this->input->get('bulan') . $this->input->get('tahun'));
        else $send = array('bulantahun' => $bulantaun);

        $data['title'] = "Data Absen";
        $jabatan = json_decode($this->client->simple_get(API_DATA_ABSEN, $send));
        $data['absen'] = $jabatan->absen;

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_absen',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $send = array('id' => "");
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = json_decode($this->client->simple_get(API_DATA_JABATAN, $send))->jabatan;
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_pegawai',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>