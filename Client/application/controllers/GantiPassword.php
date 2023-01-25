<?php

class GantiPassword extends CI_Controller{
    
    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('ganti_password', $data);
        $this->load->view('templates_admin/footer');
    }

    public function _rules(){
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[ulangi_password]');
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required');
    }
}

?>