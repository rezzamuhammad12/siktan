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
        $this->form_validation->set_rules('luas', 'Luas', 'required');
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
        $this->form_validation->set_rules('luas', 'Luas', 'required');
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
        $this->form_validation->set_rules('id_subsektor', 'Id_subsektor', 'required');
        $this->form_validation->set_rules('id_komoditas', 'id_komoditas', 'required');

        if ($this->form_validation->run() == false) {
            // echo validation_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed edit Komoditi!!</div>');
            redirect('kecamatan/komoditi');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
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

    public function masterData()
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
            $this->load->view('kecamatan/masterData', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('kecamatan/masterData');
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
}
