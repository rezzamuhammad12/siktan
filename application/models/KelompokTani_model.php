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

    function http_request($url)
    {
        // persiapkan curl
        $ch = curl_init();

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url);

        // set user agent    
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($ch);

        // tutup curl 
        curl_close($ch);

        // mengembalikan hasil curl
        return $output;
    }

    public function convertCodeArea($area, $code)
    {
        $url = "https://dev.farizdotid.com/api/daerahindonesia/$area/$code";

        $data = $this->http_request($url);

        return json_decode($data, true);
    }
}
