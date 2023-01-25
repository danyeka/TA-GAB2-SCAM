<?php

class PotonganGaji extends CI_Controller{
    
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
        $send = array(
                'id'   => $this->input->post('id')
        );
        $data['title'] = "Potongan Gaji";
        $potonganGaji = json_decode($this->client->simple_get(API_POTONGAN_GAJI, $send));
        $data['potongan_gaji'] = $potonganGaji->potongan_gaji;

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potongan_gaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Potongan Gaji";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_potongan_gaji',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>