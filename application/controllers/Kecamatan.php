<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function kelompokTani()
    {
        $this->load->model('Penyuluh_model');
        $this->load->model('KelompokTani_model');

        $data['title'] = 'Kelompok Tani';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        $data['penyuluh'] = $this->Penyuluh_model->getPenyuluh();
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();




        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required|max_length[18]|is_unique[penyuluh.nip]|numeric', [
            'is_unique' => 'NIP sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|max_length[16]|is_unique[penyuluh.nik]|numeric', [
            'is_unique' => 'NIK sudah Terdaftar'
        ]);





        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/kelompokTani', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'nip' => $this->input->post('nip'),
                'id_status' => $this->input->post('status'),
            ];
            $this->db->insert('kelompok_tani', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('kecamatan/kelompokTani');
        }
    }

    public function penyuluh()
    {
        $this->load->model('Penyuluh_model');

        $data['title'] = 'Penyuluh';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penyuluh'] = $this->Penyuluh_model->getPenyuluh();
        $data['listStatus'] = $this->db->get('list_status_penyuluh')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required|max_length[18]|is_unique[penyuluh.nip]|numeric', [
            'is_unique' => 'NIP sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|max_length[16]|is_unique[penyuluh.nik]|numeric', [
            'is_unique' => 'NIK sudah Terdaftar'
        ]);


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/penyuluh', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'nip' => $this->input->post('nip'),
                'id_status' => $this->input->post('status'),
            ];
            $this->db->insert('penyuluh', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('kecamatan/penyuluh');
        }
    }
}
