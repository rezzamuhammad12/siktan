<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelompokTani_model extends CI_Model
{
    public function getKelompokTani()
    {

        $query = "SELECT `kelompok_tani`.* ,`list_kelas`.`id` AS `id_kelas`, `list_kelas`.`kelas`, `penyuluh`.`nama` AS `nama_penyuluh`, penyuluh.`nip`, penyuluh.`nik`,`penyuluh`.`id` AS `id_penyuluh`, `list_status_penyuluh`.`status`, list_status_penyuluh.`id` AS `id_status_penyuluh`
                    FROM `kelompok_tani` INNER JOIN `list_kelas`
                        ON `kelompok_tani`.`id_kelas` = `list_kelas`.`id`
                    INNER JOIN `penyuluh`
                        ON `kelompok_tani`.`id_penyuluh` = `penyuluh`.`id`
                    INNER JOIN `list_status_penyuluh`
                    ON `penyuluh`.`id_status` = `list_status_penyuluh`.`id`
                    ";

        return $this->db->query($query)->result_array();
    }

    public function getSingleKelompokTani($id)
    {

        $query = "SELECT `kelompok_tani`.* ,`list_kelas`.`id` AS `id_kelas`, `list_kelas`.`kelas`, `penyuluh`.`nama` AS `nama_penyuluh`, `penyuluh`.`id` AS `id_penyuluh`
                    FROM `kelompok_tani` INNER JOIN `list_kelas`
                        ON `kelompok_tani`.`id_kelas` = `list_kelas`.`id`
                    INNER JOIN `penyuluh`
                        ON `kelompok_tani`.`id_penyuluh` = `penyuluh`.`id`
                    WHERE `kelompok_tani`.`id` = $id
                    ";
        return $this->db->query($query)->result_array();
    }

    public function filterKelompokTani($kota, $kec, $desa)
    {
        $key = "";
        if (!$kota == "") {
            $key .= " WHERE `kota_kab` = $kota";

            if (!$kec == "") {
                $key .= " AND `kecamatan` = " . $kec;
                if (!$desa == "") {
                    $key .= " AND `desa` = " . $desa;
                }
            }
        }

        $query = "SELECT `kelompok_tani`.* ,`list_kelas`.`id` AS `id_kelas`, `list_kelas`.`kelas`, `penyuluh`.`nama` AS `nama_penyuluh`, `penyuluh`.`id` AS `id_penyuluh`
        FROM `kelompok_tani` INNER JOIN `list_kelas`
            ON `kelompok_tani`.`id_kelas` = `list_kelas`.`id`
        INNER JOIN `penyuluh`
            ON `kelompok_tani`.`id_penyuluh` = `penyuluh`.`id` $key
        ";

        return $this->db->query($query)->result_array();
    }
}
