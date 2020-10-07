<?php
defined('BASEPATH') or exit('No direct script access allowed');


// import library dari REST_Controller
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

    //"https://dev.farizdotid.com/api/daerahindonesia/$area/$code"
    //$area = kota, kecamatan, kelurahan
    //"https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=$code";
    //$code = id_kecamatan, id_kota, id_provinsi
    //

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daerah_model');
    }

    public function provinsi_get($id)
    {
        $data = $this->Daerah_model->getDetail('provinsi', $id);

        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Provinsi tidak ditemukan'
            ], 404);
        }
    }

    public function kota_get($id = null)
    {

        if ($id) {
            $data = $this->Daerah_model->getDetail('kota', $id);
        } else {
            $id = $this->input->get('id_provinsi');
            if (!$id) {
                $this->response([
                    'status' => false,
                    'message' => 'kota tidak ditemukan'
                ], 404);
            }
            $data['kota_kabupaten'] = $this->Daerah_model->getListKota($id);
        }


        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Kota tidak ditemukan'
            ], 404);
        }
    }

    public function kecamatan_get($id = null)
    {
        if ($id) {
            $data = $this->Daerah_model->getDetail('kecamatan', $id);
        } else {
            $id = $this->input->get('id_kota');
            if (!$id) {
                $this->response([
                    'status' => false,
                    'message' => 'kecamatan tidak ditemukan'
                ], 404);
            }
            $data['kecamatan'] = $this->Daerah_model->getListKecamatan($id);
        }

        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Kecamatan tidak ditemukan'
            ], 404);
        }
    }

    public function kelurahan_get($id = null)
    {

        if ($id) {
            $data = $this->Daerah_model->getDetail('kelurahan', $id);
        } else {
            $id = $this->input->get('id_kecamatan');
            if (!$id) {
                $this->response([
                    'status' => false,
                    'message' => 'kecamatan tidak ditemukan'
                ], 404);
            }
            $data['kelurahan'] = $this->Daerah_model->getListKelurahan($id);
        }

        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Kelurahan tidak ditemukan'
            ], 404);
        }
    }
}
