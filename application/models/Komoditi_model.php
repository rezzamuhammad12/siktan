<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komoditi_model extends CI_Model
{
    public function getKomoditi()
    {

        $query = "SELECT `komoditi`.* ,`kelompok_tani`.`nama`, `list_subsektor`.`subsektor` , `list_komoditas`.`komoditas`
                    FROM `komoditi` INNER JOIN `kelompok_tani`
                        ON `komoditi`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_subsektor`
                        ON `komoditi`.`id_subsektor` = `list_subsektor`.`id`
                    INNER JOIN `list_komoditas`
                        ON `komoditi`.`id_komoditas` = `list_komoditas`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }
}
