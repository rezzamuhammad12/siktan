<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lahan_Model extends CI_Model
{
    public function getLahan()
    {

        $query = "SELECT `lahan`.`id` AS `id_lahan`, `lahan`.`luas`, `lahan`.`verifikasi` AS `verifikasi_lahan`, `lahan`.`catatan` AS `catatan_lahan`, `kelompok_tani`.*, `list_status_kepemilikan`.`status`, `list_status_kepemilikan`.`id` AS `id_status`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `lahan` INNER JOIN `kelompok_tani`
                        ON `lahan`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_kepemilikan`
                        ON `lahan`.`id_status_kepemilikan` = `list_status_kepemilikan`.`id`
                    INNER JOIN `anggota`
                        ON `lahan`.`id_anggota` = `anggota`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSingleLahan($id)
    {
        $query = "SELECT `lahan`.`id` AS `id_lahan`, `lahan`.`luas`, `lahan`.`verifikasi` AS `verifikasi_lahan`,`kelompok_tani`.*, `list_status_kepemilikan`.`status`, `list_status_kepemilikan`.`id` AS `id_status`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `lahan` INNER JOIN `kelompok_tani`
                        ON `lahan`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_kepemilikan`
                        ON `lahan`.`id_status_kepemilikan` = `list_status_kepemilikan`.`id`
                    INNER JOIN `anggota`
                        ON `lahan`.`id_anggota` = `anggota`.`id`
                    WHERE `lahan`.`id_kelompok` = $id
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getListLahan($id)
    {
        $query = "SELECT `lahan`.`id` AS `id_lahan`, `lahan`.`luas` ,`kelompok_tani`.*, `list_status_kepemilikan`.`status`, `list_status_kepemilikan`.`id` AS `id_status`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `lahan` INNER JOIN `kelompok_tani`
                        ON `lahan`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_kepemilikan`
                        ON `lahan`.`id_status_kepemilikan` = `list_status_kepemilikan`.`id`
                    INNER JOIN `anggota`
                        ON `lahan`.`id_anggota` = `anggota`.`id`
                    WHERE `lahan`.`id_anggota` = $id
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getLahanByArea($area, $id)
    {
        $query = "SELECT `lahan`.`id` AS `id_lahan`, `lahan`.`luas`, `lahan`.`verifikasi` AS `verifikasi_lahan`, `lahan`.`catatan` AS `catatan_lahan`,`kelompok_tani`.*, `list_status_kepemilikan`.`status`, `list_status_kepemilikan`.`id` AS `id_status`, `anggota`.`nama` AS `nama_anggota`, `anggota`.`id` AS `id_anggota`
                    FROM `lahan` INNER JOIN `kelompok_tani`
                        ON `lahan`.`id_kelompok` = `kelompok_tani`.`id`
                    INNER JOIN `list_status_kepemilikan`
                        ON `lahan`.`id_status_kepemilikan` = `list_status_kepemilikan`.`id`
                    INNER JOIN `anggota`
                        ON `lahan`.`id_anggota` = `anggota`.`id`
                    WHERE $area = $id
                    ";
        return $this->db->query($query)->result_array();
    }
}
