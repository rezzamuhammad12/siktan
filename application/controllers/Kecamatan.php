<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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

        if ($data['user']['role_id'] == 3) {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }

        $data['penyuluh'] = $this->Penyuluh_model->getPenyuluh();
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('penyuluh', 'Penyuluh', 'required');
        $this->form_validation->set_rules('id_kota', 'Id_kota', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'Id_kecamatan', 'required');
        $this->form_validation->set_rules('id_desa', 'Id_desa', 'required');
        $this->form_validation->set_rules('bpp', 'Bpp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tahun_pembentukan', 'Tahun_pembentukan', 'required');
        $this->form_validation->set_rules('tahun_pembentukan', 'Tahun_pembentukan', 'required');
        $this->form_validation->set_rules('id_kelas', 'Id_kelas', 'required');
        $this->form_validation->set_rules('skor', 'Skor', 'required|numeric');
        $this->form_validation->set_rules('tahun_penerapan', 'Tahun_penerapan', 'required');
        $this->form_validation->set_rules('teknologi', 'Teknologi', 'required');
        $this->form_validation->set_rules('teknologi', 'Teknologi', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/kelompokTani', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'kota_kab' => htmlspecialchars($this->input->post('id_kota', true)),
                'bpp' => htmlspecialchars($this->input->post('bpp', true)),
                'kecamatan' => htmlspecialchars($this->input->post('id_kecamatan', true)),
                'desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'tahun_pembentukan' => htmlspecialchars($this->input->post('tahun_pembentukan', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
                'skor' => htmlspecialchars($this->input->post('skor', true)),
                'tahun_penerapan' => htmlspecialchars($this->input->post('tahun_penerapan', true)),
                'teknologi' => htmlspecialchars($this->input->post('teknologi', true)),
                'id_penyuluh' => htmlspecialchars($this->input->post('penyuluh', true))
            ];
            $this->db->insert('kelompok_tani', $data);

            $last_row = $this->db->select('*')->order_by('id', "desc")->limit(1)->get('kelompok_tani')->row_array();

            $kodeKelompok = [
                'kode_kelompok' => $last_row['desa'] . $last_row['id']
            ];

            $this->db->set($kodeKelompok);
            $this->db->where('id', $last_row['id']);
            $this->db->update('kelompok_tani');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok Tani added!</div>');
            redirect('kecamatan/kelompokTani');
        }
    }

    public function editKelompokTani()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('penyuluh', 'Penyuluh', 'required');
        $this->form_validation->set_rules('id_kota', 'Id_kota', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'Id_kecamatan', 'required');
        $this->form_validation->set_rules('id_desa', 'Id_desa', 'required');
        $this->form_validation->set_rules('bpp', 'Bpp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tahun_pembentukan', 'Tahun_pembentukan', 'required');
        $this->form_validation->set_rules('tahun_pembentukan', 'Tahun_pembentukan', 'required');
        $this->form_validation->set_rules('id_kelas', 'Id_kelas', 'required');
        $this->form_validation->set_rules('skor', 'Skor', 'required|numeric');
        $this->form_validation->set_rules('tahun_penerapan', 'Tahun_penerapan', 'required');
        $this->form_validation->set_rules('teknologi', 'Teknologi', 'required');
        $this->form_validation->set_rules('teknologi', 'Teknologi', 'required');

        if ($this->form_validation->run() == false) {
            echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Kelompok Tani!!</div>');
            // redirect('kecamatan/kelompokTani');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'kota_kab' => htmlspecialchars($this->input->post('id_kota', true)),
                'bpp' => htmlspecialchars($this->input->post('bpp', true)),
                'kecamatan' => htmlspecialchars($this->input->post('id_kecamatan', true)),
                'desa' => htmlspecialchars($this->input->post('id_desa', true)),
                'tahun_pembentukan' => htmlspecialchars($this->input->post('tahun_pembentukan', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'id_kelas' => htmlspecialchars($this->input->post('id_kelas', true)),
                'skor' => htmlspecialchars($this->input->post('skor', true)),
                'tahun_penerapan' => htmlspecialchars($this->input->post('tahun_penerapan', true)),
                'teknologi' => htmlspecialchars($this->input->post('teknologi', true)),
                'id_penyuluh' => htmlspecialchars($this->input->post('penyuluh', true))
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('kelompok_tani');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok Tani Edited!! </div>');
            redirect('kecamatan/kelompokTani');
        }
    }

    public function deleteKelompokTani($id)
    {
        if ($this->db->delete('kelompok_tani', array('id' => $id))) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok Tani Deleted!!</div>');
            redirect('kecamatan/kelompokTani');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete kelompokTani!!</div>');
            redirect('kecamatan/kelompokTani');
        }
    }

    public function filterKelompok()
    {
        $this->load->model('KelompokTani_model');

        $kota = $this->input->post('kota', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $desa = $this->input->post('desa', true);
        $from = $this->input->post('from', true);
        $data['kelompokTani'] = $this->KelompokTani_model->filterKelompokTani($kota, $kecamatan, $desa);
        $data['from'] = $from;

        $hasil = $this->load->view('kecamatan/filterKelompok', $data, true);

        $callback = array(
            'hasil' => $hasil,
        );

        echo json_encode($callback);
    }

    // ==============================================
    //     Penyuluh Section 
    // ==============================================

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

                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'id_status' => htmlspecialchars($this->input->post('status', true))
            ];
            $this->db->insert('penyuluh', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penyuluh added!</div>');
            redirect('kecamatan/penyuluh');
        }
    }

    public function editPenyuluh()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required|max_length[18]|numeric', [
            'is_unique' => 'NIP sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|max_length[16]|numeric', [
            'is_unique' => 'NIK sudah Terdaftar'
        ]);

        if ($this->form_validation->run() == false) {
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Penyuluh!!</div>');
            redirect('kecamatan/penyuluh');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'id_status' => htmlspecialchars($this->input->post('status', true))
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('penyuluh');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penyuluh Edited!! </div>');
            redirect('kecamatan/penyuluh');
        }
    }

    public function deletePenyuluh($id)
    {
        if ($this->db->delete('penyuluh', array('id' => $id))) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penyuluh Deleted!!</div>');
            redirect('kecamatan/penyuluh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete Penyuluh!!</div>');
            redirect('kecamatan/penyuluh');
        }
    }


    // ==============================================
    //     Lahan Section 
    // ==============================================


    public function lahan()
    {
        $this->load->model('Lahan_model');
        $this->load->model('KelompokTani_model');

        $data['title'] = 'Lahan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] == 3) {
            $data['lahan'] = $this->Lahan_model->getLahanByArea("kecamatan", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['lahan'] = $this->Lahan_model->getLahanByArea("kota_kab", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['lahan'] = $this->Lahan_model->getLahan();
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }
        $data['listStatusKepemilikan'] = $this->db->get('list_status_kepemilikan')->result_array();


        $this->form_validation->set_rules('id_status_kepemilikan', 'Id_status_kepemilikan', 'required');
        $this->form_validation->set_rules('id_anggota', 'Id_anggota', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required|numeric');
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/lahan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'luas' => htmlspecialchars($this->input->post('luas', true)),
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'id_anggota' => htmlspecialchars($this->input->post('id_anggota', true)),
                'id_status_kepemilikan' => htmlspecialchars($this->input->post('id_status_kepemilikan', true))
            ];
            $this->db->insert('lahan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lahan added!</div>');
            redirect('kecamatan/lahan');
        }
    }

    public function editLahan()
    {
        $this->form_validation->set_rules('id_status_kepemilikan', 'Id_status_kepemilikan', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required|numeric');
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');

        if ($this->form_validation->run() == false) {
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Lahan!!</div>');
            redirect('kecamatan/lahan');
        } else {
            $data = [
                'luas' => htmlspecialchars($this->input->post('luas', true)),
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'id_status_kepemilikan' => htmlspecialchars($this->input->post('id_status_kepemilikan', true))
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('lahan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lahan Edited!! </div>');
            redirect('kecamatan/lahan');
        }
    }

    public function deleteLahan($id)
    {
        if ($this->db->delete('lahan', array('id' => $id))) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lahan Deleted!!</div>');
            redirect('kecamatan/lahan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete Lahan!!</div>');
            redirect('kecamatan/lahan');
        }
    }

    public function filterLahan()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Lahan_model');
        $from = $this->input->post('from', true);

        $data['lahan'] = $this->Lahan_model->getSingleLahan($id);
        $data['from'] = $from;

        $hasil = $this->load->view('kecamatan/filterLahan', $data, true);

        $callback = array(
            'hasil' => $hasil,
        );

        echo json_encode($callback);
    }

    // ==============================================
    //     Aset Section 
    // ==============================================

    public function aset()
    {
        $this->load->model('Aset_model');
        $this->load->model('KelompokTani_model');

        $data['title'] = 'Aset';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] == 3) {
            $data['aset'] = $this->Aset_model->getAsetByArea("kecamatan", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['aset'] = $this->Aset_model->getAsetByArea("kota_kab", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['aset'] = $this->Aset_model->getAset();
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }
        $data['listSumberPerolehan'] = $this->db->get('list_sumber_perolehan')->result_array();


        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_sumber_perolehan', 'Id_sumber_perolehan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tahun_perolehan', 'Tahun_perolehan', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/aset', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
                'id_sumber' => htmlspecialchars($this->input->post('id_sumber_perolehan', true)),
                'tahun_perolehan' => htmlspecialchars($this->input->post('tahun_perolehan', true))
            ];
            $this->db->insert('aset', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aset added!</div>');
            redirect('kecamatan/aset');
        }
    }

    public function editAset()
    {
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_sumber_perolehan', 'Id_sumber_perolehan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tahun_perolehan', 'Tahun_perolehan', 'required');

        if ($this->form_validation->run() == false) {
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Aset!!</div>');
            redirect('kecamatan/aset');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
                'id_sumber' => htmlspecialchars($this->input->post('id_sumber_perolehan', true)),
                'tahun_perolehan' => htmlspecialchars($this->input->post('tahun_perolehan', true))
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('aset');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aset Edited!! </div>');
            redirect('kecamatan/aset');
        }
    }

    public function deleteAset($id)
    {
        if ($this->db->delete('aset', array('id' => $id))) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aset Deleted!!</div>');
            redirect('kecamatan/aset');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete Aset!!</div>');
            redirect('kecamatan/aset');
        }
    }

    public function filterAset()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Aset_model');
        $from = $this->input->post('from', true);

        $data['aset'] = $this->Aset_model->getSingleAset($id);
        $data['from'] = $from;

        $hasil = $this->load->view('kecamatan/filterAset', $data, true);

        $callback = array(
            'hasil' => $hasil,
        );

        echo json_encode($callback);
    }

    // ==============================================
    //     komoditi Section 
    // ==============================================

    public function komoditi()
    {
        $this->load->model('Komoditi_model');
        $this->load->model('KelompokTani_model');

        $data['title'] = 'Komoditi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        if ($data['user']['role_id'] == 3) {
            $data['komoditi'] = $this->Komoditi_model->getKomoditiByArea("kecamatan", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['komoditi'] = $this->Komoditi_model->getKomoditiByArea("kota_kab", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['komoditi'] = $this->Komoditi_model->getKomoditi();
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }

        $data['listSubsektor'] = $this->db->get('list_subsektor')->result_array();
        $data['listKomoditas'] = $this->db->get('list_komoditas')->result_array();


        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');
        $this->form_validation->set_rules('id_anggota', 'Id_anggota', 'required');
        $this->form_validation->set_rules('id_subsektor', 'Id_subsektor', 'required');
        $this->form_validation->set_rules('id_komoditas', 'id_komoditas', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/komoditi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'id_anggota' => htmlspecialchars($this->input->post('id_anggota', true)),
                'id_subsektor' => htmlspecialchars($this->input->post('id_subsektor', true)),
                'id_komoditas' => htmlspecialchars($this->input->post('id_komoditas', true))
            ];
            $this->db->insert('komoditi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">komoditi added!</div>');
            redirect('kecamatan/komoditi');
        }
    }

    public function editKomoditi()
    {
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');
        $this->form_validation->set_rules('id_anggota', 'Id_anggota', 'required');
        $this->form_validation->set_rules('id_subsektor', 'Id_subsektor', 'required');
        $this->form_validation->set_rules('id_komoditas', 'id_komoditas', 'required');

        if ($this->form_validation->run() == false) {
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Komoditi!!</div>');
            redirect('kecamatan/komoditi');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'id_anggota' => htmlspecialchars($this->input->post('id_anggota', true)),
                'id_subsektor' => htmlspecialchars($this->input->post('id_subsektor', true)),
                'id_komoditas' => htmlspecialchars($this->input->post('id_komoditas', true))
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('komoditi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komoditi Edited!! </div>');
            redirect('kecamatan/komoditi');
        }
    }

    public function deleteKomoditi($id)
    {
        if ($this->db->delete('komoditi', array('id' => $id))) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komoditi Deleted!!</div>');
            redirect('kecamatan/komoditi');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete Komoditi!!</div>');
            redirect('kecamatan/komoditi');
        }
    }

    public function filterKomoditi()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Komoditi_model');
        $from = $this->input->post('from', true);

        $data['komoditi'] = $this->Komoditi_model->getSingleKomoditi($id);
        $data['from'] = $from;


        $hasil = $this->load->view('kecamatan/filterKomoditi', $data, true);

        $callback = array(
            'hasil' => $hasil,
        );

        echo json_encode($callback);
    }

    public function getListKomoditas()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Komoditi_model');

        $data = $this->Komoditi_model->getListKomoditas($id);

        echo json_encode($data);
    }

    // ==============================================
    //     Anggota Section 
    // ==============================================

    public function anggota()
    {
        $this->load->model('Anggota_model');
        $this->load->model('KelompokTani_model');

        $data['title'] = 'Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        if ($data['user']['role_id'] == 3) {
            $data['anggota'] = $this->Anggota_model->getAnggotaByArea("kecamatan", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['anggota'] = $this->Anggota_model->getAnggotaByArea("kota_kab", $data['user']['id_kecamatan']);
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['anggota'] = $this->Anggota_model->getAnggota();
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }

        $data['listStatusAnggota'] = $this->db->get('list_status_anggota')->result_array();

        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_status', 'Id_status', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/anggota', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_status' => htmlspecialchars($this->input->post('id_status', true))
            ];
            $this->db->insert('anggota', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota added!</div>');
            redirect('kecamatan/anggota');
        }
    }

    public function editAnggota()
    {
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_status', 'Id_status', 'required');

        if ($this->form_validation->run() == false) {
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Anggota!!</div>');
            redirect('kecamatan/anggota');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id_status' => htmlspecialchars($this->input->post('id_status', true))
            ];
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('anggota');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota Edited!! </div>');
            redirect('kecamatan/anggota');
        }
    }

    public function deleteAnggota($id)
    {
        if ($this->db->delete('anggota', array('id' => $id))) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota Deleted!!</div>');
            redirect('kecamatan/anggota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed delete Anggota!!</div>');
            redirect('kecamatan/anggota');
        }
    }

    public function getListAnggota()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Anggota_model');

        $data = $this->Anggota_model->getSingleAnggota($id);

        echo json_encode($data);
    }

    public function filterAnggota()
    {
        $id = $this->input->post('id', true);
        $this->load->model('Anggota_model');
        $from = $this->input->post('from', true);


        $data['anggota'] = $this->Anggota_model->getSingleAnggota($id);
        $data['from'] = $from;



        $hasil = $this->load->view('kecamatan/filterAnggota', $data, true);

        $callback = array(
            'hasil' => $hasil,
        );

        echo json_encode($callback);
    }

    public function index()
    {
        $this->load->model('KelompokTani_model');

        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 3) {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('kecamatan');
        }
    }

    public function detailMasterData($id)
    {
        $this->load->model('KelompokTani_model');
        $this->load->model('Aset_model');
        $this->load->model('Anggota_model');
        $this->load->model('Komoditi_model');
        $this->load->model('Lahan_model');

        $data['title'] = 'Detail Data Kelompok';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getSingleKelompokTani($id);
        $data['aset'] = $this->Aset_model->getSingleAset($id);
        $data['anggota'] = $this->Anggota_model->getSingleAnggota($id);
        $data['komoditi'] = $this->Komoditi_model->getSingleKomoditi($id);
        $data['lahan'] = $this->Lahan_model->getSingleLahan($id);

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/detailMasterData', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('kecamatan/detailMasterData');
        }
    }

    public function excelColumnRange($lower, $upper)
    {
        ++$upper;
        for ($i = $lower; $i !== $upper; ++$i) {
            yield $i;
        }
    }

    public function export_excel()
    {
        $this->load->model('KelompokTani_model');
        $this->load->model('Anggota_model');
        $this->load->model('Lahan_model');
        $this->load->model('Komoditi_model');
        $this->load->model('Aset_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 3) {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kecamatan", $data['user']['id_kecamatan']);
        } else if ($data['user']['role_id'] == 2) {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTaniByArea("kota_kab", $data['user']['id_kota']);
        } else {
            $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        }
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();

        $spreadsheet = new Spreadsheet;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('siktan.co.th')
            ->setLastModifiedBy('Siktan')
            ->setTitle('Master Data')
            ->setSubject('Generate Excel use PhpSpreadsheet in CodeIgniter')
            ->setDescription('Export data to Excel Work for me!');
        // add style to the header
        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'ffffff'),
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => array('rgb' => '009343')
            )
        );
        $spreadsheet->getActiveSheet()->getStyle('A7:AB7')->applyFromArray($styleArray);

        // auto fit column to content
        foreach ($this->excelColumnRange('A', 'AB') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $spreadsheet->getActiveSheet()->mergeCells('A2:B2');
        $spreadsheet->getActiveSheet()->mergeCells('A3:B3');
        $spreadsheet->getActiveSheet()->mergeCells('A4:B4');
        $spreadsheet->getActiveSheet()->mergeCells('A5:B5');
        $sheet->setCellValue('A2', 'Kabupaten/Kota : ');
        $sheet->setCellValue('A3', 'Kecamatan : ');
        $sheet->setCellValue('A4', 'Admin : ');
        $sheet->setCellValue('A5', 'No Hp : ');

        $kotaAdmin = $this->KelompokTani_model->convertCodeArea("kota", $data['user']['id_kota']);
        $kecAdmin = $this->KelompokTani_model->convertCodeArea("kecamatan", $data['user']['id_kecamatan']);

        if (!is_null($kotaAdmin)) {
            $sheet->setCellValue('C2', $kotaAdmin['nama']);
        }

        if (!is_null($kecAdmin)) {
            $sheet->setCellValue('C3', $kecAdmin['nama']);
        }
        $sheet->setCellValue('C4', $data['user']['name']);
        $sheet->setCellValue('C5', $data['user']['no_hp']);

        $sheet->setCellValue('A7', 'No');
        $sheet->setCellValue('B7', 'BPP');
        $sheet->setCellValue('C7', 'Kecamatan');
        $sheet->setCellValue('D7', 'Desa');
        $sheet->setCellValue('E7', 'Penyuluh Pendamping');
        $sheet->setCellValue('F7', 'Nip Penyuluh');
        $sheet->setCellValue('G7', 'Nik Penyuluh');
        $sheet->setCellValue('H7', 'Status Penyuluh');
        $sheet->setCellValue('I7', 'Nama Kelompok Tani Binaan');
        $sheet->setCellValue('J7', 'Tahun Pembentukan');
        $sheet->setCellValue('K7', 'Alamat Sekretariat');
        $sheet->setCellValue('L7', 'Kelas');
        $sheet->setCellValue('M7', 'Skor');
        $sheet->setCellValue('N7', 'Tahun Penetapan');
        $sheet->setCellValue('O7', 'Jumlah Anggota');
        $sheet->setCellValue('P7', 'No');
        $sheet->setCellValue('Q7', 'Nama Anggota');
        $sheet->setCellValue('R7', 'Nik Anggota');
        $sheet->setCellValue('S7', 'Status Dalam Kelompok');
        $sheet->setCellValue('T7', 'Luas Lahan (ha)');
        $sheet->setCellValue('U7', 'Status Kepemilikan Lahan');
        $sheet->setCellValue('V7', 'Subsektor');
        $sheet->setCellValue('W7', 'Komoditas');
        $sheet->setCellValue('X7', 'Aset Kelompok');
        $sheet->setCellValue('Y7', 'Sumber Perolehan Aset');
        $sheet->setCellValue('Z7', 'Jumlah Aset');
        $sheet->setCellValue('AA7', 'Tahun Perolehan');
        $sheet->setCellValue('AB7', 'Teknologi yang di Gunakan');

        $kolom = 8;
        $nomor = 1;

        // echo "<pre>", var_dump($data['kelompokTani']), "</pre>";
        foreach ($data['kelompokTani'] as $ex) {
            $kec = $this->KelompokTani_model->convertCodeArea("kecamatan", $ex['kecamatan']);
            $desa = $this->KelompokTani_model->convertCodeArea("kelurahan", $ex['desa']);

            $sheet->setCellValue('A' . $kolom, $nomor);
            $sheet->setCellValue('B' . $kolom, $ex['bpp']);
            $sheet->setCellValue('C' . $kolom, $kec['nama']);
            $sheet->setCellValue('D' . $kolom, $desa['nama']);
            $sheet->setCellValue('E' . $kolom, $ex['nama_penyuluh']);
            $sheet->setCellValue('F' . $kolom, "'" . $ex['nip']);
            $sheet->setCellValue('G' . $kolom, "'" . $ex['nik']);
            $sheet->setCellValue('H' . $kolom, $ex['status']);
            $sheet->setCellValue('I' . $kolom, $ex['nama']);
            $sheet->setCellValue('J' . $kolom, $ex['tahun_pembentukan']);
            $sheet->setCellValue('K' . $kolom, $ex['alamat']);
            $sheet->setCellValue('L' . $kolom, $ex['kelas']);
            $sheet->setCellValue('M' . $kolom, $ex['skor']);
            $sheet->setCellValue('N' . $kolom, $ex['tahun_penerapan']);

            $anggota = $this->Anggota_model->getSingleAnggota($ex['id']);
            $aset = $this->Aset_model->getSingleAset($ex['id']);
            $kolomAnggota = $kolom;
            $nomorAnggota = 1;
            foreach ($anggota as $a) {
                $lahan = $this->Lahan_model->getListLahan($a['id']);
                $komoditi = $this->Komoditi_model->getListKomoditi($a['id']);
                $sheet->setCellValue('P' . $kolomAnggota, $nomorAnggota);
                $sheet->setCellValue('Q' . $kolomAnggota, $a['nama']);
                $sheet->setCellValue('R' . $kolomAnggota, "'" . $a['nik']);
                $sheet->setCellValue('S' . $kolomAnggota, $a['status']);

                if (!empty($lahan)) {
                    $sheet->setCellValue('T' . $kolomAnggota, $lahan[0]['luas']);
                    $sheet->setCellValue('U' . $kolomAnggota, $lahan[0]['status']);
                }

                if (!empty($komoditi)) {
                    $sheet->setCellValue('V' . $kolomAnggota, $komoditi[0]['subsektor']);
                    $sheet->setCellValue('W' . $kolomAnggota, $komoditi[0]['komoditas']);
                }


                $nomorAnggota++;
                $kolomAnggota++;
            };

            $sheet->setCellValue('O' . $kolom, $nomorAnggota - 1);
            $kolomAset = $kolom;
            foreach ($aset as $a) {
                $sheet->setCellValue('X' . $kolomAset, $a['nama']);
                $sheet->setCellValue('Y' . $kolomAset, $a['sumber_perolehan']);
                $sheet->setCellValue('Z' . $kolomAset, $a['jumlah']);
                $sheet->setCellValue('AA' . $kolomAset, $a['tahun_perolehan']);
                $kolomAset++;
            }

            $sheet->setCellValue('AB' . $kolom, $ex['teknologi']);
            $kolom = $kolomAnggota - 1;
            $kolom++;
            $nomor++;
        }

        // Sheet 2 Kode area section
        $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Kode Area');
        $spreadsheet->addSheet($myWorkSheet, 1);

        $sheet2 = $spreadsheet->getSheet(1);
        $sheet2->getStyle('A1:F1')->applyFromArray($styleArray);

        $sheet2->setCellValue('A1', 'Kabupaten/Kota');
        $sheet2->setCellValue('B1', 'Kode');
        $sheet2->setCellValue('C1', 'Kecamatan');
        $sheet2->setCellValue('D1', 'Kode');
        $sheet2->setCellValue('E1', 'Desa/Kelurahan');
        $sheet2->setCellValue('F1', 'Kode');

        foreach (range('A', 'F') as $columnId) {
            $sheet2->getColumnDimension($columnId)->setAutoSize(true);
        }


        $kecamatan = $this->KelompokTani_model->getCodeArea("kecamatan", $kotaAdmin['id']);

        $kolom2 = 2;
        $kolomKecamatan = 2;

        $sheet2->setCellValue('A' . $kolom2, $kotaAdmin['nama']);
        $sheet2->setCellValue('B' . $kolom2, $kotaAdmin['id']);
        foreach ($kecamatan['kecamatan'] as $k) {

            $sheet2->setCellValue('C' . $kolomKecamatan, $k['nama']);
            $sheet2->setCellValue('D' . $kolomKecamatan, $k['id']);
            $kelurahan = $this->KelompokTani_model->getCodeArea("kelurahan", $k['id']);

            foreach ($kelurahan['kelurahan'] as $kel) {
                $sheet2->setCellValue('E' . $kolomKecamatan, $kel['nama']);
                $sheet2->setCellValue('F' . $kolomKecamatan, $kel['id']);
                $kolomKecamatan++;
            }
        }

        // Sheet 3 Petunjuk Pengisian
        $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Petunjuk Pengisian');
        $spreadsheet->addSheet($myWorkSheet, 2);
        $center = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true
            ]
        );

        $border = array(
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' =>  array('rgb' => '000000'),
                ],
            ],
        );


        $sheet3 = $spreadsheet->getSheet(2);
        $sheet3->mergeCells('A1:K2');
        $sheet3->getStyle('A1')->applyFromArray($center);
        $sheet3->getStyle('A16:B16')->applyFromArray($center);
        $sheet3->getStyle('B15')->applyFromArray($styleArray);
        $sheet3->getStyle('F15')->applyFromArray($styleArray);
        $sheet3->getStyle('I15')->applyFromArray($styleArray);
        $sheet3->getStyle('B24')->applyFromArray($styleArray);
        $sheet3->getStyle('F24')->applyFromArray($styleArray);
        $sheet3->getStyle('B32:F32')->applyFromArray($styleArray);
        $sheet3->mergeCells('B3:K3');
        $sheet3->mergeCells('B4:K4');
        $sheet3->mergeCells('B5:K5');
        $sheet3->mergeCells('B6:K6');

        $sheet3->mergeCells('B7:K7');
        $sheet3->mergeCells('B8:K8');
        $sheet3->mergeCells('B9:K9');
        $sheet3->mergeCells('B10:K10');
        $sheet3->mergeCells('B11:K11');
        $sheet3->mergeCells('B12:K12');
        $sheet3->mergeCells('B13:K13');

        $sheet3->mergeCells('B15:D15');
        $sheet3->mergeCells('C16:D16');

        $sheet3->mergeCells('F15:G15');

        $sheet3->mergeCells('I15:K15');
        $sheet3->mergeCells('J16:K16');

        $sheet3->mergeCells('B24:D24');
        $sheet3->mergeCells('C25:D25');

        $sheet3->mergeCells('F24:G24');

        $sheet3->mergeCells('B32:E32');
        $sheet3->mergeCells('C33:E33');

        $sheet3->mergeCells('F32:H32');
        $sheet3->mergeCells('G33:H33');

        foreach (range('A', 'K') as $columnId) {
            $sheet3->getColumnDimension($columnId)->setAutoSize(true);
        }

        $sheet3->setCellValue('A1', 'Petunjuk Pengisian');
        $sheet3->setCellValue('A3', '1.');
        $sheet3->setCellValue('B3', 'Pastikan Penulisan Area (Kabupaten/Kota, Kecamatan, Desa/Kelurahan)');
        $sheet3->setCellValue('B4', 'sesuai dengan daftar. Bisa menulis nama daerah atau kode daerah');
        $sheet3->setCellValue('A5', '2.');
        $sheet3->setCellValue('B5', 'Penulisan Luas Lahan menggunakan titik (.) dalam satuan hektar (ha)');
        $sheet3->setCellValue('A6', '3.');
        $sheet3->setCellValue('B6', 'Kolom-kolom berikut harus diisi sesuai dengan daftar yang tertera');

        $sheet3->setCellValue('B7', 'Status Penyuluh');
        $sheet3->setCellValue('B8', 'Kelas');
        $sheet3->setCellValue('B9', 'Status Dalam Kelompok');
        $sheet3->setCellValue('B10', 'Status Kepemilikan Lahan');
        $sheet3->setCellValue('B11', 'Subsektor');
        $sheet3->setCellValue('B12', 'Komoditas');
        $sheet3->setCellValue('B13', 'Sumber Perolehan');

        $sheet3->setCellValue('B15', 'Status Penyuluh');
        $sheet3->setCellValue('B16', 'ID');
        $sheet3->setCellValue('C16', 'Status');

        $sheet3->setCellValue('F15', 'Kelas');
        $sheet3->setCellValue('F16', 'ID');
        $sheet3->setCellValue('G16', 'Kelas');

        $sheet3->setCellValue('I15', 'Status Anggota');
        $sheet3->setCellValue('I16', 'ID');
        $sheet3->setCellValue('J16', 'status');

        $sheet3->setCellValue('B24', 'Status Kepemilikan');
        $sheet3->setCellValue('B25', 'ID');
        $sheet3->setCellValue('C25', 'Status');

        $sheet3->setCellValue('F24', 'Sumber Perolehan');
        $sheet3->setCellValue('F25', 'ID');
        $sheet3->setCellValue('G25', 'Kelas');

        $sheet3->setCellValue('B32', 'Subsektor');
        $sheet3->setCellValue('B33', 'ID');
        $sheet3->setCellValue('C33', 'Subsektor');

        $sheet3->setCellValue('F32', 'Komoditas');
        $sheet3->setCellValue('F33', 'ID');
        $sheet3->setCellValue('G33', 'Subsektor');

        $statusPenyuluh = $this->db->get('list_status_penyuluh')->result_array();
        $kelas = $this->db->get('list_kelas')->result_array();
        $statusAnggota = $this->db->get('list_status_anggota')->result_array();
        $statusKepemilikan = $this->db->get('list_status_kepemilikan')->result_array();
        $subsektor = $this->db->get('list_subsektor')->result_array();

        $sumber = $this->db->get('list_sumber_perolehan')->result_array();

        $kolom = 17;
        foreach ($statusPenyuluh as $key => $value) {
            $sheet3->mergeCells('C' . $kolom . ':D' . $kolom);
            $sheet3->setCellValue('B' . $kolom, $value['id']);
            $sheet3->setCellValue('C' . $kolom, $value['status']);
            $kolom++;
        }

        $sheet3->getStyle('B15:D' . ($kolom - 1))->applyFromArray($border);

        $kolom = 17;
        foreach ($kelas as $key => $value) {
            $sheet3->setCellValue('F' . $kolom, $value['id']);
            $sheet3->setCellValue('G' . $kolom, $value['kelas']);
            $kolom++;
        }
        $sheet3->getStyle('F15:G' . ($kolom - 1))->applyFromArray($border);

        $kolom = 17;
        foreach ($statusAnggota as $key => $value) {
            $sheet3->mergeCells('J' . $kolom . ':K' . $kolom);
            $sheet3->setCellValue('I' . $kolom, $value['id']);
            $sheet3->setCellValue('J' . $kolom, $value['status']);
            $kolom++;
        }
        $sheet3->getStyle('I15:K' . ($kolom - 1))->applyFromArray($border);

        $kolom = 26;
        foreach ($statusKepemilikan as $key => $value) {
            $sheet3->mergeCells('C' . $kolom . ':D' . $kolom);
            $sheet3->setCellValue('B' . $kolom, $value['id']);
            $sheet3->setCellValue('C' . $kolom, $value['status']);
            $kolom++;
        }

        $sheet3->getStyle('B24:D' . ($kolom - 1))->applyFromArray($border);

        $kolom = 26;
        foreach ($sumber as $key => $value) {
            $sheet3->setCellValue('F' . $kolom, $value['id']);
            $sheet3->setCellValue('G' . $kolom, $value['sumber_perolehan']);
            $kolom++;
        }
        $sheet3->getStyle('F24:G' . ($kolom - 1))->applyFromArray($border);

        $kolom = 34;
        foreach ($subsektor as $key => $value) {
            $sheet3->mergeCells('C' . $kolom . ':E' . $kolom);

            $sheet3->setCellValue('B' . $kolom, $value['id']);
            $sheet3->setCellValue('C' . $kolom, $value['subsektor']);

            $komoditas = $this->db->get_where('list_komoditas', ['id_subsektor' => $value['id']])->result_array();
            foreach ($komoditas as $kom) {
                $sheet3->mergeCells('C' . $kolom . ':E' . $kolom);
                $sheet3->mergeCells('G' . $kolom . ':H' . $kolom);
                $sheet3->setCellValue('F' . $kolom, $kom['id']);
                $sheet3->setCellValue('G' . $kolom, $kom['komoditas']);
                $kolom++;
            }
        }

        $sheet3->getStyle('B32:H' . ($kolom - 1))->applyFromArray($border);




        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="SiktanJabar.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        die;
        // redirect('kecamatan');
    }

    public function import_excel()
    {
        $this->load->model('KelompokTani_model');
        $this->load->model('Anggota_model');
        $this->load->model('Lahan_model');
        $this->load->model('Komoditi_model');
        $this->load->model('Aset_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();

        $error = false;
        $listError = "";

        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            // =======================================================================
            // Prepare Data
            // =======================================================================

            $penyuluh = array();
            $kelompokTani = array();
            $anggota = array();
            $lahan = array();
            $komoditi = array();
            $aset = array();
            $i = 0;
            $kota = "";
            foreach ($sheetData as $key => $value) {

                if ($key == 1) {
                    $kota = $value[2];
                }

                if ($key < 7) {
                    continue;
                }
                $penyuluh[$i]['nama'] = $value[4];
                $penyuluh[$i]['nip'] = str_replace("'", "", $value[5]);
                $penyuluh[$i]['nik'] = str_replace("'", "", $value[6]);
                $penyuluh[$i]['status'] = $value[7];

                $kelompokTani[$i]['kota_kab'] = $kota;
                $kelompokTani[$i]['nama'] = $value[8];
                $kelompokTani[$i]['bpp'] = $value[1];
                $kelompokTani[$i]['id_penyuluh'] = $penyuluh[$i]['nik'];
                $kelompokTani[$i]['kecamatan'] = $value[2];
                $kelompokTani[$i]['desa'] = $value[3];
                $kelompokTani[$i]['tahun_pembentukan'] = $value[9];
                $kelompokTani[$i]['alamat'] = $value[10];
                $kelompokTani[$i]['id_kelas'] = $value[11];
                $kelompokTani[$i]['skor'] = $value[12];
                $kelompokTani[$i]['tahun_penerapan'] = $value[13];
                $kelompokTani[$i]['teknologi'] = $value[27];

                $anggota[$i]['kelompok'] = $value[8];
                $anggota[$i]['nama'] = $value[16];
                $anggota[$i]['nik'] = str_replace("'", "", $value[17]);
                $anggota[$i]['status'] = $value[18];

                $lahan[$i]['luas'] = $value[19];
                $lahan[$i]['id_kelompok'] = $value[8];
                $lahan[$i]['id_anggota'] = $value[16];
                $lahan[$i]['id_status_kepemilikan'] = $value[20];

                $komoditi[$i]['id_kelompok'] = $value[8];
                $komoditi[$i]['id_anggota'] = $value[16];
                $komoditi[$i]['id_subsektor'] = $value[21];
                $komoditi[$i]['id_komoditas'] = $value[22];

                $aset[$i]['id_kelompok'] = $value[8];
                $aset[$i]['nama'] = $value[23];
                $aset[$i]['id_sumber'] = $value[24];
                $aset[$i]['jumlah'] = $value[25];
                $aset[$i]['tahun_perolehan'] = $value[26];

                $i++;
            }

            // echo "<pre>", var_dump($aset), "</pre>";
            // =======================================================================
            // Import Penyuluh
            // =======================================================================

            foreach ($penyuluh as $key => $value) {
                $nip = $this->db->get_where('penyuluh', array('nip' => $value['nip']))->row();
                $this->db->select('id');
                $this->db->where('status', $value['status']);
                $status =  $this->db->get('list_status_penyuluh')->row_array();


                if (is_null($nip) && !(is_null($value['nama']))) {
                    // echo "<pre>", var_dump($status), "</pre>";
                    if (is_null($status)) {
                        $error = true;
                        $listError .= "<li>Kesalahan pada status penyuluh, Kolom H" . ($key + 8) . ". Pastikan nama status sesuai dengan petunjuk </li>";
                    }
                    $data = [
                        'nama' => $value['nama'],
                        'nip' => $value['nip'],
                        'nik' => $value['nik'],
                        'id_status' => $status['id'],
                    ];
                    $this->db->insert('penyuluh', $data);
                }
            }
            // =======================================================================
            // Import Kelompok Tani
            // =======================================================================
            $newKelompokTani = array();
            $i = 0;
            foreach ($kelompokTani as $key => $value) {
                if (!is_null($value['nama'])) {
                    // ===============================================
                    // validasi area (kota, kecamatan, kelurahan)
                    // ===============================================
                    $idKota = $this->KelompokTani_model->convertAreaToCode("kota", $value['kota_kab'], '32');
                    if ($idKota) {
                        $idKec = $this->KelompokTani_model->convertAreaToCode("kecamatan", $value['kecamatan'], $idKota);
                        if ($idKec) {
                            $idKel = $this->KelompokTani_model->convertAreaToCode("kelurahan", $value['desa'], $idKec);
                            if (!$idKel) {
                                $error = true;
                                $listError .= "<li>Kesalahan pada Desa/Kelurahan, Kolom D" . ($key + 8) . " Pastikan Desa/Kelurahan sesuai dengan daftar </li>";
                            }
                        } else {
                            $error = true;
                            $listError .= "<li>Kesalahan pada Kecamatan, Kolom C" . ($key + 8) . " Pastikan Kecamatan sesuai dengan daftar </li>";
                        }
                    } else {
                        $error = true;
                        $listError .= "<li>Kesalahan pada Kabupaten/Kota, Kolom C2. Pastikan Kabupaten/kota sesuai dengan daftar </li>";
                    }

                    // ===============================================
                    // validasi Penyuluh
                    // ===============================================
                    $id_penyuluh = $this->db->get_where('penyuluh', array('nik' => $value['id_penyuluh']))->row_array();

                    // ===============================================
                    // validasi Kelas
                    // ===============================================
                    $id_kelas = $this->db->get_where('list_kelas', array('kelas' => $value['id_kelas']))->row_array();

                    if (!$id_kelas) {
                        $error = true;
                        $listError .= "<li>Kesalahan pada Kelas, Kolom L" . ($key + 8) . " Pastikan Kelas sesuai dengan daftar </li>";
                    }

                    $newKelompokTani[$i]['kota_kab'] = htmlspecialchars($idKota);
                    $newKelompokTani[$i]['nama'] = htmlspecialchars($value['nama']);
                    $newKelompokTani[$i]['bpp'] = htmlspecialchars($value['bpp']);
                    $newKelompokTani[$i]['id_penyuluh'] = htmlspecialchars($id_penyuluh['id']);
                    $newKelompokTani[$i]['kecamatan'] = htmlspecialchars($idKec);
                    $newKelompokTani[$i]['desa'] = htmlspecialchars($idKel);
                    $newKelompokTani[$i]['tahun_pembentukan'] = htmlspecialchars($value['tahun_pembentukan']);
                    $newKelompokTani[$i]['alamat'] = htmlspecialchars($value['alamat']);
                    $newKelompokTani[$i]['id_kelas'] = htmlspecialchars($id_kelas['id']);
                    $newKelompokTani[$i]['skor'] = htmlspecialchars($value['skor']);
                    $newKelompokTani[$i]['tahun_penerapan'] = htmlspecialchars($value['tahun_penerapan']);
                    $newKelompokTani[$i]['teknologi'] = htmlspecialchars($value['teknologi']);
                    $i++;
                }
            }

            // =======================================================================
            // Import Anggota
            // =======================================================================
            $newAnggota = array();
            $i = 0;
            foreach ($anggota as $key => $value) {
                $id_status = $this->db->get_where('list_status_anggota', array('status' => $value['status']))->row_array();

                if ($id_status) {
                    $newAnggota[$i]['id_status'] = $id_status['id'];
                    $newAnggota[$i]['id_kelompok'] = htmlspecialchars($value['kelompok']);
                    $newAnggota[$i]['nama'] = htmlspecialchars($value['nama']);
                    $newAnggota[$i]['nik'] = htmlspecialchars($value['nik']);
                    $i++;
                } else {
                    $error = true;
                    $listError .= "<li>Kesalahan pada status anggota, Kolom S" . ($key + 8) . " Pastikan status anggota sesuai dengan daftar </li>";
                }
            }

            // =======================================================================
            // Import Lahan
            // =======================================================================
            $newLahan = array();
            $i = 0;
            foreach ($lahan as $key => $value) {
                if ($value['id_status_kepemilikan']) {
                    $id_status = $this->db->get_where('list_status_kepemilikan', array('status' => $value['id_status_kepemilikan']))->row_array();
                    if ($id_status) {
                        $newLahan[$i]['id_status_kepemilikan'] = $id_status['id'];
                        $newLahan[$i]['id_kelompok'] = htmlspecialchars($value['id_kelompok']);
                        $newLahan[$i]['id_anggota'] = htmlspecialchars($value['id_anggota']);
                        $newLahan[$i]['luas'] = htmlspecialchars($value['luas']);
                        $i++;
                    } else {
                        $error = true;
                        $listError .= "<li>Kesalahan pada status kepemilikan lahan, Kolom U" . ($key + 8) . " Pastikan status anggota sesuai dengan daftar </li>";
                    };
                };
            }

            // =======================================================================
            // Import Komoditi
            // =======================================================================

            $newKomoditi = array();
            $i = 0;
            foreach ($komoditi as $key => $value) {
                if ($value['id_subsektor']) {
                    $id_subsektor = $this->db->get_where('list_subsektor', array('subsektor' => $value['id_subsektor']))->row_array();
                    if ($id_subsektor) {
                        $id_komoditas = $this->db->get_where('list_komoditas', array('komoditas' => $value['id_komoditas'], 'id_subsektor' => $id_subsektor['id']))->row_array();

                        if ($id_komoditas) {
                            $newKomoditi[$i]['id_kelompok'] = htmlspecialchars($value['id_kelompok']);
                            $newKomoditi[$i]['id_anggota'] = htmlspecialchars($value['id_anggota']);
                            $newKomoditi[$i]['id_subsektor'] = $id_subsektor['id'];
                            $newKomoditi[$i]['id_komoditas'] = $id_komoditas['id'];
                            $i++;
                        } else {
                            $error = true;
                            $listError .= "<li>Kesalahan pada komoditas, Kolom W" . ($key + 8) . " Pastikan status anggota sesuai dengan daftar </li>";
                        }
                    } else {
                        $error = true;
                        $listError .= "<li>Kesalahan pada subsektor, Kolom V" . ($key + 8) . " Pastikan subsektor sesuai dengan daftar </li>";
                    };
                };
            }

            // =======================================================================
            // Import Aset
            // =======================================================================
            $newAset = array();
            $i = 0;
            foreach ($aset as $key => $value) {

                if ($value['nama']) {
                    $id_sumber_perolehan = $this->db->get_where('list_sumber_perolehan', array('sumber_perolehan' => $value['id_sumber']))->row_array();
                    if ($id_sumber_perolehan) {
                        $newAset[$i]['id_kelompok'] = htmlspecialchars($value['id_kelompok']);
                        $newAset[$i]['nama'] = htmlspecialchars($value['nama']);
                        $newAset[$i]['id_sumber'] = $id_sumber_perolehan['id'];
                        $newAset[$i]['jumlah'] = htmlspecialchars($value['jumlah']);
                        $newAset[$i]['tahun_perolehan'] = htmlspecialchars($value['tahun_perolehan']);
                        $i++;
                    } else {
                        $error = true;
                        $listError .= "<li>Kesalahan pada sumber perolehan, Kolom Y" . ($key + 8) . " Pastikan sumber perolehan sesuai dengan daftar </li>";
                    }
                }
            }

            $last_row = array();
            if (!$error) {
                foreach ($newKelompokTani as $key => $value) {
                    $this->db->insert('kelompok_tani', $value);
                    $last_row[$key] = $this->db->select('*')->order_by('id', "desc")->limit(1)->get('kelompok_tani')->row_array();

                    $kodeKelompok = [
                        'kode_kelompok' => $last_row[$key]['desa'] . $last_row[$key]['id']
                    ];

                    $this->db->set($kodeKelompok);
                    $this->db->where('id', $last_row[$key]['id']);
                    $this->db->update('kelompok_tani');
                }

                $i = -1;
                $addedAnggota = array();
                foreach ($newAnggota as $key => $value) {
                    if ($value['id_kelompok']) {
                        $i++;
                    }

                    $value['id_kelompok'] = $last_row[$i]['id'];
                    $this->db->insert('anggota', $value);
                    $addedAnggota[$key] = $this->db->select('*')->order_by('id', "desc")->limit(1)->get('anggota')->row_array();
                }

                $i = -1;
                $j = -1;
                foreach ($newLahan as $key => $value) {
                    if ($value['id_kelompok']) {
                        $i++;
                    }

                    if ($value['id_anggota']) {
                        $j++;
                    }
                    $value['id_kelompok'] = $last_row[$i]['id'];
                    $value['id_anggota'] = $addedAnggota[$j]['id'];
                    $this->db->insert('lahan', $value);
                }

                $i = -1;
                $j = -1;
                foreach ($newKomoditi as $key => $value) {
                    if ($value['id_kelompok']) {
                        $i++;
                    }

                    if ($value['id_anggota']) {
                        $j++;
                    }
                    $value['id_kelompok'] = $last_row[$i]['id'];
                    $value['id_anggota'] = $addedAnggota[$j]['id'];
                    $sukses = $this->db->insert('komoditi', $value);
                }

                $i = -1;
                foreach ($newAset as $key => $value) {
                    if ($value['id_kelompok']) {
                        $i++;
                    }

                    $value['id_kelompok'] = $last_row[$i]['id'];
                    // echo "<pre>", var_dump($value), "</pre>";
                    $sukses = $this->db->insert('aset', $value);
                    // echo "<pre>", var_dump($sukses), "</pre>";
                }

                $this->session->set_flashdata('import_message', '<div class="alert alert-success" role="alert">Import Berhasil!</div>');
            } else {
                // echo $listError;
                // echo "kesini?";
                $this->session->set_flashdata('import_message', '<div class="alert alert-danger" role="alert">Import Gagal! <ul>' . $listError . ' </ul></div>');
            }

            redirect('kecamatan');
        }
    }
}

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
        //  Read rows 1 to 7 and columns A to E only
        if ($row >= 1) {
            if (
                in_array($column, range('A', 'E')) &&
                in_array($column, range('I', 'N')) &&
                in_array($column, range('AB', 'AB'))
            ) {
                return true;
            }
        }
        return false;
    }
}
