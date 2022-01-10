<?php
class Nomorsurat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Suratmenyurat_model', 'suratmenyurat');
    if (!$this->session->userdata('nama')) {
      redirect('halo');
    }
  }

  public function index()
  {
    $data['judul'] = 'Nomor Surat';
    $data['no_surat_masuk'] = $this->suratmenyurat->mengambilNomorSuratMasuk();
    $data['no_surat_keluar'] = $this->suratmenyurat->ambilNomorSuratKeluar();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav');
    $this->load->view('surat/nomorsurat', $data);
    $this->load->view('templates/footer');
  }

  public function ubahnomorsuratmasuk()
  {
    // var_dump($this->input->post('no_surat_masuk'));
    $this->suratmenyurat->ubahnomorsuratmasuk();
    redirect('nomorsurat');
  }

  public function ubahnomorsuratkeluar()
  {
    $this->suratmenyurat->ubahnomorsuratkeluar();
    redirect('nomorsurat');
  }
}
