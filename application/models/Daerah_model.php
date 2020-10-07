<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daerah_model extends CI_Model
{
    public function getListKota($id)
    {
        $query = "SELECT *
                  FROM `kota` 
                  WHERE `id_provinsi` = $id
                ";
        return $this->db->query($query)->result_array();
    }

    public function getListKecamatan($id)
    {
        $query = "SELECT *
                  FROM `kecamatan` 
                  WHERE `id_kota` = $id
                ";
        return $this->db->query($query)->result();
    }

    public function getListKelurahan($id)
    {
        $query = "SELECT *
                  FROM `kelurahan` 
                  WHERE `id_kecamatan` = $id
                ";
        return $this->db->query($query)->result();
    }

    public function getDetail($area, $id)
    {
        $query = "SELECT *
                  FROM $area 
                  WHERE `id` = $id
                ";
        return $this->db->query($query)->row();
    }
}
