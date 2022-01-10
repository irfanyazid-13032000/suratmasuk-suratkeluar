<?php
class Datadiri extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    if (!$this->session->userdata('nama')) {
      redirect('halo');
    }
  }

  public function index()
  {
    $data['judul'] = 'Profil';
    $data['profil'] = $this->user->getProfil();
    $data['unit'] = ['Jasa Keuangan Syariah', 'Jasa', 'SDM & Umum', 'Pengadaan Barang & Jasa', 'Perdagangan', 'Akuntansi'];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav');
    $this->load->view('datadiri/index', $data);
    $this->load->view('templates/footer');
  }


  public function ubahdatadiri()
  {
    $this->user->ubahdatadiri();

    redirect('close/logout');
  }
}
