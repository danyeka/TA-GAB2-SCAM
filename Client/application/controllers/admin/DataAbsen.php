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

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah_data();
        } else {
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tangga_masuk = $this->input->post('tangga_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            $photo = $_FILES['photo']['name'];

            if($photo= ''){

            } else {
                $config['upload_path'] = './ext/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('photo')){
                    echo "Photo Gagal diupload!";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'           => $this->input->post('nik'),
                'nama_pegawai'  => $this->input->post('nama_pegawai'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jabatan'       => $this->input->post('jabatan'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'status'        => $this->input->post('status'),
                'photo'         => $photo
            );

            $response = json_decode($this->client->simple_post(API_DATA_PEGAWAI, $data));
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


    public function delete_data($id)
    {
        $data = array(
            'id_pegawai' => $id
        );

        $response = json_decode($this->client->simple_get(API_DATA_PEGAWAI . 'Update', $data));
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
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }
}

?>