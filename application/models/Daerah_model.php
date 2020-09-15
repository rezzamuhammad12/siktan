<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daerah_model extends CI_Model
{
    public function getKota()
    {
        $query = "SELECT * FROM regencies WHERE province_id=32";

        return $this->db->query($query)->result_array();
    }

    public function getKecamatan($id)
    {
        $query = "SELECT * FROM districts WHERE regency_id=$id";

        return $this->db->query($query)->result_array();
    }
}
