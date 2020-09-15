<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_model extends CI_Model
{
    public function getAset()
    {

        $query = "SELECT `aset`.* , `list_sumber_perolehan`.`sumber_perolehan` ,`kelompok_tani`.`nama`
                    FROM `aset` INNER JOIN `list_sumber_perolehan`
                        ON `aset`.`id_sumber` = `list_sumber_perolehan`.`id`
                    INNER JOIN `kelompok_tani`
                        ON `aset`.`id_kelompok` = `kelompok_tani`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }
}
