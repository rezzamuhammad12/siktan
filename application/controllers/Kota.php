<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Penyuluh_model');
        $this->load->model('KelompokTani_model');
        $this->load->model('Aset_model');
        $this->load->model('Anggota_model');
        $this->load->model('Komoditi_model');
        $this->load->model('Lahan_model');
    }

    public function index()
    {

        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        $data['penyuluh'] = $this->Penyuluh_model->getPenyuluh();
        $data['aset'] = $this->Aset_model->getAsetByArea("kota_kab", $data['user']['id_kota']);
        $data['anggota'] = $this->Anggota_model->getAnggotaByArea("kota_kab", $data['user']['id_kota']);
        $data['komoditi'] = $this->Komoditi_model->getKomoditiByArea("kota_kab", $data['user']['id_kota']);
        $data['lahan'] = $this->Lahan_model->getLahanByArea("kota_kab", $data['user']['id_kota']);
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kota/masterData', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('kota');
        }
    }


    public function verifikasi($id)
    {

        $data['title'] = 'Verifikasi Kelompok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getSingleKelompokTani($id);

        $this->form_validation->set_rules('btn-verif', 'Btn-verif', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kota/verifikasi', $data);
            $this->load->view('templates/footer');
        } else {
            $verif = $this->input->post('btn-verif');


            $data = [
                'approved_by' => $data['user']['id'],
                'verifikasi' => $verif,
                'catatan' => htmlspecialchars($this->input->post('catatan'))
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('kelompok_tani');

            if ($verif == "diverifikasi") {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Verifikasi Berhasil!! </div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Revisi Telah diberikan!! </div>');
            }


            redirect('kota/verifikasi/' . $id);
        }
    }

    public function detailMasterData($id)
    {

        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getSingleKelompokTani($id);
        $data['aset'] = $this->Aset_model->getSingleAset($id);
        $data['anggota'] = $this->Anggota_model->getSingleAnggota($id);
        $data['komoditi'] = $this->Komoditi_model->getSingleKomoditi($id);
        $data['lahan'] = $this->Lahan_model->getSingleLahan($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kota/detailMasterData', $data);
        $this->load->view('templates/footer');
    }

    public function verifikasiPenyuluh()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            redirect('kota');
        } else {
            $verif = $this->input->post('btn-verif');
            $data = [
                'approved_by' => $data['user']['id'],
                'verifikasi' => $verif,
                'catatan' => htmlspecialchars($this->input->post('catatan'))
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('penyuluh');

            if ($verif == "diverifikasi") {
                $this->session->set_flashdata('message_penyuluh', '<div class="alert alert-success" role="alert">Verifikasi Berhasil!! </div>');
            } else {
                $this->session->set_flashdata('message_penyuluh', '<div class="alert alert-warning" role="alert">Revisi Telah diberikan!! </div>');
            }


            redirect('kota/#penyuluh');
        }
    }

    public function verifikasiLahan()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            redirect('kota');
        } else {
            $verif = $this->input->post('btn-verif');
            $data = [
                'approved_by' => $data['user']['id'],
                'verifikasi' => $verif,
                'catatan' => htmlspecialchars($this->input->post('catatan'))
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('lahan');

            if ($verif == "diverifikasi") {
                $this->session->set_flashdata('message_lahan', '<div class="alert alert-success" role="alert">Verifikasi Berhasil!! </div>');
            } else {
                $this->session->set_flashdata('message_lahan', '<div class="alert alert-warning" role="alert">Revisi Telah diberikan!! </div>');
            }


            redirect('kota/#lahan');
        }
    }

    public function verifikasiAset()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            redirect('kota');
        } else {
            $verif = $this->input->post('btn-verif');
            $data = [
                'approved_by' => $data['user']['id'],
                'verifikasi' => $verif,
                'catatan' => htmlspecialchars($this->input->post('catatan'))
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('aset');

            if ($verif == "diverifikasi") {
                $this->session->set_flashdata('message_aset', '<div class="alert alert-success" role="alert">Verifikasi Berhasil!! </div>');
            } else {
                $this->session->set_flashdata('message_aset', '<div class="alert alert-warning" role="alert">Revisi Telah diberikan!! </div>');
            }


            redirect('kota/#aset');
        }
    }

    public function verifikasiKomoditi()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            redirect('kota');
        } else {
            $verif = $this->input->post('btn-verif');
            $data = [
                'approved_by' => $data['user']['id'],
                'verifikasi' => $verif,
                'catatan' => htmlspecialchars($this->input->post('catatan'))
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('komoditi');

            if ($verif == "diverifikasi") {
                $this->session->set_flashdata('message_komoditi', '<div class="alert alert-success" role="alert">Verifikasi Berhasil!! </div>');
            } else {
                $this->session->set_flashdata('message_komoditi', '<div class="alert alert-warning" role="alert">Revisi Telah diberikan!! </div>');
            }


            redirect('kota/#komoditi');
        }
    }

    public function verifikasiAnggota()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            redirect('kota');
        } else {
            $verif = $this->input->post('btn-verif');
            $data = [
                'approved_by' => $data['user']['id'],
                'verifikasi' => $verif,
                'catatan' => htmlspecialchars($this->input->post('catatan'))
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('anggota');

            if ($verif == "diverifikasi") {
                $this->session->set_flashdata('message_anggota', '<div class="alert alert-success" role="alert">Verifikasi Berhasil!! </div>');
            } else {
                $this->session->set_flashdata('message_anggota', '<div class="alert alert-warning" role="alert">Revisi Telah diberikan!! </div>');
            }


            redirect('kota/#anggota');
        }
    }
}
