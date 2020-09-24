<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_model extends CI_Model
{
    public function getAset()
    {

        $query = "SELECT `aset`.* , `list_sumber_perolehan`.`sumber_perolehan`, `list_sumber_perolehan`.`id` AS `id_sumber`,`kelompok_tani`.`nama` AS `nama_kelompok`, `kelompok_tani`.`id` AS `id_kelompok`
                    FROM `aset` INNER JOIN `list_sumber_perolehan`
                        ON `aset`.`id_sumber` = `list_sumber_perolehan`.`id`
                    INNER JOIN `kelompok_tani`
                        ON `aset`.`id_kelompok` = `kelompok_tani`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSingleAset($id)
    {
        $query = "SELECT `aset`.* , `list_sumber_perolehan`.`sumber_perolehan`, `list_sumber_perolehan`.`id` AS `id_sumber`,`kelompok_tani`.`nama` AS `nama_kelompok`, `kelompok_tani`.`id` AS `id_kelompok`
        FROM `aset` INNER JOIN `list_sumber_perolehan`
            ON `aset`.`id_sumber` = `list_sumber_perolehan`.`id`
        INNER JOIN `kelompok_tani`
            ON `aset`.`id_kelompok` = `kelompok_tani`.`id`
            WHERE `aset`.`id_kelompok` = $id
        ";
        return $this->db->query($query)->result_array();
    }
}
