<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAnggota()
    {

        $query = "SELECT `anggota`.* ,`kelompok_tani`.`nama` AS `nama_kelompok`, `list_status_anggota`.`status`
                    FROM `anggota` INNER JOIN `kelompok_tani`
                        ON `anggota`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_anggota`
                        ON `anggota`.`id_status` = `list_status_anggota`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function hitungJumlahAnggota()
    {
        $query = $this->db->get('anggota');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getSingleAnggota($id)
    {
        $query = "SELECT `anggota`.* ,`kelompok_tani`.`nama` AS `nama_kelompok`, `list_status_anggota`.`status`
                    FROM `anggota` INNER JOIN `kelompok_tani`
                        ON `anggota`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_anggota`
                        ON `anggota`.`id_status` = `list_status_anggota`.`id`
                    WHERE `anggota`.`id_kelompok` = $id
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getAnggotaByArea($area, $id)
    {
        $query = "SELECT `anggota`.* ,`kelompok_tani`.`nama` AS `nama_kelompok`, `list_status_anggota`.`status`
                    FROM `anggota` INNER JOIN `kelompok_tani`
                        ON `anggota`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_anggota`
                        ON `anggota`.`id_status` = `list_status_anggota`.`id`
                    WHERE $area = $id;
                    ";
        return $this->db->query($query)->result_array();
    }
}
