<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lahan_Model extends CI_Model
{
    public function getLahan()
    {

        $query = "SELECT `lahan`.`id` AS `id_lahan`, `lahan`.`luas` ,`kelompok_tani`.*, `list_status_kepemilikan`.`status`, `list_status_kepemilikan`.`id` AS `id_status`
                    FROM `lahan` INNER JOIN `kelompok_tani`
                        ON `lahan`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_kepemilikan`
                        ON `lahan`.`id_status_kepemilikan` = `list_status_kepemilikan`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }
}
