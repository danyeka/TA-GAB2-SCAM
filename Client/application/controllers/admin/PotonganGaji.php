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

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah_data();
        } else {
            $jumlah_potongan = $this->input->post('jumlah_potongan');
            $jenis_potongan = $this->input->post('jenis_potongan');

            $data = array(
                'jumlah_potongan'   => $this->input->post('jumlah_potongan'),
                'jenis_potongan'    => $this->input->post('jenis_potongan')
            );

            $response = json_decode($this->client->simple_post(API_POTONGAN_GAJI, $data));
            if ($response->pesan){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }

            $this->index();
        }
    }

    public function update_data($id)
    {
        $send = array('id' => $id);
        $response = json_decode($this->client->simple_get(API_POTONGAN_GAJI, $send));
        $data['potongan_gaji'] = $response->potongan_gaji;

        $data['title'] = "Update Potongan Gaji";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_potongan_gaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $id = $this->input->post('id');
            $data = array(
                'jumlah_potongan'   => $this->input->post('jumlah_potongan'),
                'jenis_potongan'    => $this->input->post('jenis_potongan'),
                'id'                => $this->input->post('id')
            );

            $response = json_decode($this->client->simple_post(API_POTONGAN_GAJI . 'Update', $data));
            if ($response->pesan){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diUpdate</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal diUpdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }

            $this->index();
        }
    }

    public function delete_data($id)
    {
        $data = array(
            'id' => $id
        );

        $response = json_decode($this->client->simple_get(API_POTONGAN_GAJI . 'Update', $data));
        if ($response->pesan){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        }

        $this->index();
    }

    public function _rules(){
        $this->form_validation->set_rules('jenis_potongan', 'Jenis Potongan', 'required');
        $this->form_validation->set_rules('jumlah_potongan', 'Jumlah Potongan', 'required');
    }
}

?>