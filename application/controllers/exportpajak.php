<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class exportpajak extends CI_Controller
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


    $data['pajak'] = $this->mobil_model->getDataExportExcelPajak($this->session->userdata('keyword'));





    $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

    $sheet = $spreadsheet->getActiveSheet();

    $kolom = 1;

    $sheet->setCellValue('A' . $kolom, "No");
    $sheet->setCellValue('B' . $kolom, "Nopol");
    $sheet->setCellValue('C' . $kolom, "Perakitan");
    $sheet->setCellValue('D' . $kolom, "Merk");
    $sheet->setCellValue('E' . $kolom, "Masa STNK");


    $baris = $kolom + 1;
    $no = 1;


    foreach ($data['pajak'] as $pajek) {
      // manually set table data value
      $sheet->setCellValue('A' . $baris, $no);
      $sheet->setCellValue('B' . $baris, $pajek['nopol']);
      $sheet->setCellValue('C' . $baris, $pajek['tahun']);
      $sheet->setCellValue('D' . $baris, $pajek['merk']);
      $sheet->setCellValue('E' . $baris, $pajek['stnk']);
      $baris++;
      $no++;
    }


    $writer = new Xlsx($spreadsheet); // instantiate Xlsx
    if (null !== $this->session->userdata('keyword')) {
      $filename = 'Data pencarian berdasarkan ' . $this->session->userdata('keyword'); // set filename for excel file to be exported
    } else {
      $filename = 'Seluruh Data Pajak';
    }



    header('Content-Type: application/vnd.ms-excel'); // generate excel file
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');  // download file 
  }
}
