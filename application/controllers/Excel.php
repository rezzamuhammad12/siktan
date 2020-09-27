<?php defined('BASEPATH') or die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Excel_model');
    }

    public function index()
    {
        $data['excel'] = $this->Excel_model->getAll()->result();
    }

    public function export()
    {
        $excel = $this->Excel_model->getAll()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'BPP')
            ->setCellValue('C1', 'Kecamatan')
            ->setCellValue('D1', 'Desa')
            ->setCellValue('E1', 'Penyuluh Pendamping')
            ->setCellValue('F1', 'Nip Penyuluh')
            ->setCellValue('G1', 'Nik Penyuluh')
            ->setCellValue('H1', 'Status Penyuluh')
            ->setCellValue('I1', 'Nama Kelompok Tani Binaan')
            ->setCellValue('J1', 'Tahun Pembentukan')
            ->setCellValue('K1', 'Alamat Sekretariat')
            ->setCellValue('L1', 'Kelas')
            ->setCellValue('M1', 'Skor')
            ->setCellValue('N1', 'Tahun Penetapan')
            ->setCellValue('O1', 'Jumlah Anggota')
            ->setCellValue('P1', 'No')
            ->setCellValue('Q1', 'Nama Anggota')
            ->setCellValue('R1', 'Nik Anggota')
            ->setCellValue('S1', 'Status Dalam Kelompok')
            ->setCellValue('T1', 'Luas Lahan (ha)')
            ->setCellValue('U1', 'Status Kepemilikan Lahan')
            ->setCellValue('V1', 'Subsektor')
            ->setCellValue('W1', 'Komoditas')
            ->setCellValue('X1', 'Aset Kelompok')
            ->setCellValue('Y1', 'Sumber Perolehan Aset')
            ->setCellValue('Z1', 'Jumlah Aset')
            ->setCellValue('AA1', 'Tahun Perolehan')
            ->setCellValue('AB1', 'Teknologi yang di Gunakan');

        $kolom = 2;
        $nomor = 1;
        foreach ($excel as $ex) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $ex->bpp)
                ->setCellValue('C' . $kolom, $ex->kecamatan)
                ->setCellValue('D' . $kolom, $ex->desa)
                ->setCellValue('E' . $kolom, $ex->nama)
                ->setCellValue('F' . $kolom, $ex->nip)
                ->setCellValue('G' . $kolom, $ex->nik)
                ->setCellValue('H' . $kolom, $ex->status)
                ->setCellValue('I' . $kolom, $ex->nama_kelompok)
                ->setCellValue('J' . $kolom, $ex->tahun_pembentukan)
                ->setCellValue('K' . $kolom, $ex->alamat)
                ->setCellValue('L' . $kolom, $ex->kelas)
                ->setCellValue('M' . $kolom, $ex->skor)
                ->setCellValue('N' . $kolom, $ex->tahun_penerapan)
                ->setCellValue('O' . $kolom, $ex->jumlah_anggota)
                ->setCellValue('P' . $kolom, $nomor)
                ->setCellValue('Q' . $kolom, $ex->nama_anggota)
                ->setCellValue('R' . $kolom, $ex->nik_anggota)
                ->setCellValue('S' . $kolom, $ex->status_kelompok)
                ->setCellValue('T' . $kolom, $ex->luas)
                ->setCellValue('U' . $kolom, $ex->status_pemilik)
                ->setCellValue('V' . $kolom, $ex->subsektor)
                ->setCellValue('W' . $kolom, $ex->komoditas)
                ->setCellValue('X' . $kolom, $ex->aset_kelompok)
                ->setCellValue('Y' . $kolom, $ex->sumber_aset)
                ->setCellValue('Z' . $kolom, $ex->jumlah_aset)
                ->setCellValue('AA' . $kolom, $ex->tahun_perolehan)
                ->setCellValue('AB' . $kolom, $ex->teknologi);


            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="SiktanJabar.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
