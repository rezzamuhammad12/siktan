<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterData_model extends CI_Model
{
    public function getMasterData()
    {

        $query = "SELECT `kelompok_tani`.* ,
        `list_kelas`.`id` AS `id_kelas`, `list_kelas`.`kelas`, 
        `penyuluh`.`penyuluh`.`id` AS `id_penyuluh`, `nama` AS `nama_penyuluh`,
        `aset`.`id` AS


                    FROM `kelompok_tani` INNER JOIN `list_kelas`
                        ON `kelompok_tani`.`id_kelas` = `list_kelas`.`id`
                    INNER JOIN `penyuluh`
                        ON `kelompok_tani`.`id_penyuluh` = `penyuluh`.`id`
                    ";

        return $this->db->query($query)->result_array();
    }
}
