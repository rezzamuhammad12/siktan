<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyuluh_model extends CI_Model
{
    public function getPenyuluh()
    {
        $query = "SELECT `penyuluh`.*, `list_status_penyuluh`.`status`, `list_status_penyuluh`.`id` AS `id_status`
                  FROM `penyuluh` JOIN `list_status_penyuluh`
                  ON `penyuluh`.`id_status` = `list_status_penyuluh`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function hitungJumlahPenyuluh()
    {
        $query = $this->db->get('penyuluh');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
