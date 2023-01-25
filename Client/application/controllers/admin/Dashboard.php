<?php

class Dashboard extends CI_Controller{
    
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
        $data['title'] = "Dashboard";

        $jabatan = json_decode($this->client->simple_get(API_DATA_JABATAN));
        $kehadiran = json_decode($this->client->simple_get(API_DATA_ABSEN));
        $pegawai = json_decode($this->client->simple_get(API_DATA_PEGAWAI));

        $data['admin'] = $pegawai->admin_jumlah;
        $data['pegawai'] = $pegawai->pegawai_jumlah;
        $data['jabatan'] = $jabatan->jabatan_jumlah;
        $data['kehadiran'] = $kehadiran->kehadiran_jumlah;

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>