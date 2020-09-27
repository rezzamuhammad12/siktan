<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komoditi_model extends CI_Model
{
    public function getKomoditi()
    {

        $query = "SELECT `komoditi`.* ,`kelompok_tani`.`nama`, `list_subsektor`.`subsektor` , `list_komoditas`.`komoditas`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `komoditi` INNER JOIN `kelompok_tani`
                        ON `komoditi`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_subsektor`
                        ON `komoditi`.`id_subsektor` = `list_subsektor`.`id`
                    INNER JOIN `list_komoditas`
                        ON `komoditi`.`id_komoditas` = `list_komoditas`.`id`
                    INNER JOIN `anggota`
                        ON `komoditi`.`id_anggota` = `anggota`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSingleKomoditi($id)
    {

        $query = "SELECT `komoditi`.* ,`kelompok_tani`.`nama`, `list_subsektor`.`subsektor` , `list_komoditas`.`komoditas`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `komoditi` INNER JOIN `kelompok_tani`
                        ON `komoditi`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_subsektor`
                        ON `komoditi`.`id_subsektor` = `list_subsektor`.`id`
                    INNER JOIN `list_komoditas`
                        ON `komoditi`.`id_komoditas` = `list_komoditas`.`id`
                    INNER JOIN `anggota`
                        ON `komoditi`.`id_anggota` = `anggota`.`id`
                    
                    WHERE `komoditi`.`id_kelompok` = $id
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getListKomoditi($id)
    {

        $query = "SELECT `komoditi`.* ,`kelompok_tani`.`nama`, `list_subsektor`.`subsektor` , `list_komoditas`.`komoditas`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `komoditi` INNER JOIN `kelompok_tani`
                        ON `komoditi`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_subsektor`
                        ON `komoditi`.`id_subsektor` = `list_subsektor`.`id`
                    INNER JOIN `list_komoditas`
                        ON `komoditi`.`id_komoditas` = `list_komoditas`.`id`
                    INNER JOIN `anggota`
                        ON `komoditi`.`id_anggota` = `anggota`.`id`
                    
                    WHERE `komoditi`.`id_anggota` = $id
                    ";
        return $this->db->query($query)->result_array();
    }
}
