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
        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        $data['penyuluh'] = $this->Penyuluh_model->getPenyuluh();
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();

        $this->form_validation->set_rules('kode_kelompok', 'Kode_kelompok', 'required');
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
                'kode_kelompok' => htmlspecialchars($this->input->post('kode_kelompok', true)),
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelompok Tani added!</div>');
            redirect('kecamatan/kelompokTani');
        }
    }

    public function editKelompokTani()
    {
        $this->form_validation->set_rules('kode_kelompok', 'Kode_kelompok', 'required');
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
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Kelompok Tani!!</div>');
            redirect('kecamatan/kelompokTani');
        } else {
            $data = [
                'kode_kelompok' => htmlspecialchars($this->input->post('kode_kelompok', true)),
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">kelompokTani Deleted!!</div>');
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
        $data['lahan'] = $this->Lahan_model->getLahan();

        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
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
        $data['aset'] = $this->Aset_model->getAset();

        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
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
        $data['komoditi'] = $this->Komoditi_model->getKomoditi();

        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
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
        $data['anggota'] = $this->Anggota_model->getAnggota();

        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
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
        $this->load->model('Penyuluh_model');
        $this->load->model('KelompokTani_model');
        $this->load->model('Aset_model');
        $this->load->model('Anggota_model');
        $this->load->model('Komoditi_model');
        $this->load->model('Lahan_model');

        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        $data['penyuluh'] = $this->Penyuluh_model->getPenyuluh();
        $data['aset'] = $this->Aset_model->getAset();
        $data['anggota'] = $this->Anggota_model->getAnggota();
        $data['komoditi'] = $this->Komoditi_model->getKomoditi();
        $data['lahan'] = $this->Lahan_model->getLahan();
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kecamatan/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('kecamatan/index');
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

    public function export_excel()
    {
        $this->load->model('KelompokTani_model');
        $this->load->model('Anggota_model');
        $this->load->model('Lahan_model');
        $this->load->model('Komoditi_model');
        $this->load->model('Aset_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
        $data['listKelas'] = $this->db->get('list_kelas')->result_array();

        $spreadsheet = new Spreadsheet;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('siktan.co.th')
            ->setLastModifiedBy('Cholcool')
            ->setTitle('how to export data to excel use phpspreadsheet in codeigniter')
            ->setSubject('Generate Excel use PhpSpreadsheet in CodeIgniter')
            ->setDescription('Export data to Excel Work for me!');
        // add style to the header
        $styleArray = array(
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('rgb' => '#000000'),
                ),
            ),
            'fill' => array(
                'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array('rgb' => '00FF00'),
                'endColor'   => array('rgb' => '32CD32'),
            ),
        );
        $spreadsheet->getActiveSheet()->getStyle('A1:AB1')->applyFromArray($styleArray);
        // auto fit column to content
        foreach (range('A', 'AB') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }


        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'BPP');
        $sheet->setCellValue('C1', 'Kecamatan');
        $sheet->setCellValue('D1', 'Desa');
        $sheet->setCellValue('E1', 'Penyuluh Pendamping');
        $sheet->setCellValue('F1', 'Nip Penyuluh');
        $sheet->setCellValue('G1', 'Nik Penyuluh');
        $sheet->setCellValue('H1', 'Status Penyuluh');
        $sheet->setCellValue('I1', 'Nama Kelompok Tani Binaan');
        $sheet->setCellValue('J1', 'Tahun Pembentukan');
        $sheet->setCellValue('K1', 'Alamat Sekretariat');
        $sheet->setCellValue('L1', 'Kelas');
        $sheet->setCellValue('M1', 'Skor');
        $sheet->setCellValue('N1', 'Tahun Penetapan');
        $sheet->setCellValue('O1', 'Jumlah Anggota');
        $sheet->setCellValue('P1', 'No');
        $sheet->setCellValue('Q1', 'Nama Anggota');
        $sheet->setCellValue('R1', 'Nik Anggota');
        $sheet->setCellValue('S1', 'Status Dalam Kelompok');
        $sheet->setCellValue('T1', 'Luas Lahan (ha)');
        $sheet->setCellValue('U1', 'Status Kepemilikan Lahan');
        $sheet->setCellValue('V1', 'Subsektor');
        $sheet->setCellValue('W1', 'Komoditas');
        $sheet->setCellValue('X1', 'Aset Kelompok');
        $sheet->setCellValue('Y1', 'Sumber Perolehan Aset');
        $sheet->setCellValue('Z1', 'Jumlah Aset');
        $sheet->setCellValue('AA1', 'Tahun Perolehan');
        $sheet->setCellValue('AB1', 'Teknologi yang di Gunakan');

        $kolom = 2;
        $nomor = 1;
        foreach ($data['kelompokTani'] as $ex) {
            $sheet->setCellValue('A' . $kolom, $nomor);
            $sheet->setCellValue('B' . $kolom, $ex['bpp']);
            $sheet->setCellValue('C' . $kolom, $ex['kecamatan']);
            $sheet->setCellValue('D' . $kolom, $ex['desa']);
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
                $sheet->setCellValue('T' . $kolomAnggota, $lahan[0]['luas']);
                $sheet->setCellValue('U' . $kolomAnggota, $lahan[0]['status']);
                $sheet->setCellValue('V' . $kolomAnggota, $komoditi[0]['subsektor']);
                $sheet->setCellValue('W' . $kolomAnggota, $komoditi[0]['komoditas']);

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

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="SiktanJabar.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        // $writer->save('recruitment_form.xlsx');
        redirect('kecamatan/index');
    }

    // public function import_excel()
    // {
    //     $this->load->model('KelompokTani_model');
    //     $this->load->model('Anggota_model');
    //     $this->load->model('Lahan_model');
    //     $this->load->model('Komoditi_model');
    //     $this->load->model('Aset_model');
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['kelompokTani'] = $this->KelompokTani_model->getKelompokTani();
    //     $data['listKelas'] = $this->db->get('list_kelas')->result_array();

    //     $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    //     if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

    //         $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    //         $extension = end($arr_file);

    //         if ('csv' == $extension) {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    //         } else {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //         }

    //         $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

    //         $sheetData = $spreadsheet->getActiveSheet()->toArray();
    //         for ($i = 1; $i < count($sheetData); $i++) {
    //             $kode_kelompok = $sheetData[$i]['1'];
    //             $nama = $sheetData[$i]['2'];
    //             $kota_kab = $sheetData[$i]['3'];
    //             $bpp = $sheetData[$i]['4'];
    //             $kecamatan = $sheetData[$i]['5'];
    //             $desa = $sheetData[$i]['6'];
    //             $tahun_pembentukan = $sheetData[$i]['7'];
    //             $alamat = $sheetData[$i]['8'];
    //             $skor = $sheetData[$i]['9'];
    //             $tahun_penerapan = $sheetData[$i]['10'];
    //             $teknologi = $sheetData[$i]['11'];

    //             mysqli_query($this->db, "insert into tb_siswa (id,kode_kelompok,nama,kota_kab,bpp,kecamatan,desa,tahun_pembentukan,alamat,skor,tahun_penerapan,teknologi) values ('','$kode_kelompok','$nama','$kota_kab,$bpp,$kecamatan,$desa,$tahun_pembentukan,$alamat,$skor,$tahun_penerapan,$teknologi')");
    //         }
    //     }
    // }
}
