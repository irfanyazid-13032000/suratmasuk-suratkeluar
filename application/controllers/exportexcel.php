<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class exportexcel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mobil_model');
  }

  public function index()
  {

    // if (null !== $this->session->userdata('tglmulai') && null !== $this->session->userdata('tglselesai')) {
    //   $data['tglmulai'] = $this->session->userdata('tglmulai');
    //   $data['tglselesai'] = $this->session->userdata('tglselesai');
    //   $data['kendaraan'] = $this->kendaraan_model->getDataExportExcelKendaraan($data['tglmulai'], $data['tglselesai']);
    // } else {
    //   $data['tglmulai'] = null;
    //   $data['tglselesai'] = null;
    //   $data['kendaraan'] = $this->kendaraan_model->getData();
    // }


    $data['asuransi'] = $this->mobil_model->getDataExportExcelAsuransi($this->session->userdata('keyword'));





    $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

    $sheet = $spreadsheet->getActiveSheet();

    $kolom = 1;

    $sheet->setCellValue('A' . $kolom, "No");
    $sheet->setCellValue('B' . $kolom, "Nopol");
    $sheet->setCellValue('C' . $kolom, "Perakitan");
    $sheet->setCellValue('D' . $kolom, "Merk");
    $sheet->setCellValue('E' . $kolom, "Rangka");
    $sheet->setCellValue('F' . $kolom, "Mesin");
    $sheet->setCellValue('G' . $kolom, "Bahan Bakar");
    $sheet->setCellValue('H' . $kolom, "Instansi");
    $sheet->setCellValue('I' . $kolom, "Asuransi");
    $sheet->setCellValue('J' . $kolom, "Polis");
    $sheet->setCellValue('K' . $kolom, "Pertanggungan");
    $sheet->setCellValue('L' . $kolom, "Premi");

    $baris = $kolom + 1;
    $no = 1;


    foreach ($data['asuransi'] as $asu) {
      // manually set table data value
      $sheet->setCellValue('A' . $baris, $no);
      $sheet->setCellValue('B' . $baris, $asu['nopol']);
      $sheet->setCellValue('C' . $baris, $asu['tahun']);
      $sheet->setCellValue('D' . $baris, $asu['merk']);
      $sheet->setCellValue('E' . $baris, $asu['rangka']);
      $sheet->setCellValue('F' . $baris, $asu['mesin']);
      $sheet->setCellValue('G' . $baris, $asu['bahan_bakar']);
      $sheet->setCellValue('H' . $baris, $asu['instansi']);
      $sheet->setCellValue('I' . $baris, $asu['asuransi']);
      $sheet->setCellValue('J' . $baris, $asu['polis']);
      $sheet->setCellValue('K' . $baris, $asu['pertanggungan']);
      $sheet->setCellValue('L' . $baris, $asu['premi']);
      $baris++;
      $no++;
    }


    $writer = new Xlsx($spreadsheet); // instantiate Xlsx
    if (null !== $this->session->userdata('keyword')) {
      $filename = 'Data pencarian berdasarkan ' . $this->session->userdata('keyword'); // set filename for excel file to be exported
    } else {
      $filename = 'Seluruh Data Asuransi';
    }



    header('Content-Type: application/vnd.ms-excel'); // generate excel file
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');  // download file 
  }
}
