<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelompokTani_model extends CI_Model
{
    public function getKelompokTani()
    {

        $query = "SELECT `kelompok_tani`.* ,`list_kelas`.*, `penyuluh`.`nama` AS `nama_penyuluh`
                    FROM `kelompok_tani` INNER JOIN `list_kelas`
                        ON `kelompok_tani`.`id_kelas` = `list_kelas`.`id`
                    INNER JOIN `penyuluh`
                        ON `kelompok_tani`.`id_penyuluh` = `penyuluh`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }
}
