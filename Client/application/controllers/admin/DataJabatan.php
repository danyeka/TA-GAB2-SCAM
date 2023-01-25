<?php

class DataJabatan extends CI_Controller{
    
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
        $send = array('id' => "");
        $data['title'] = "Data Jabatan";
        $jabatan = json_decode($this->client->simple_get(API_DATA_JABATAN, $send));
        $data['jabatan'] = $jabatan->jabatan;

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jabatan',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>