<?php
class Pajak extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mobil_model', 'mobil');
  }

  public function index()
  {
    $data['judul'] = 'Pajak';
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->mobil->getJumlahDataPajak($data['keyword']);

    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = base_url() . '/pajak/index/';

    $this->pagination->initialize($config);


    if ($config['total_rows'] <= $config['per_page']) {
      $data['start'] = 0;
      // jika hasil query kurang dari uri segment maka data start nya uri segment - per page
    } elseif ($config['total_rows'] <= $this->uri->segment(3)) {
      $data['start'] = $this->uri->segment(3) - $config['per_page'];
      // jika tidak ada $config['total_rows']
    } else {
      $data['start'] = $this->uri->segment(3);
    }

    $data['pajak'] = $this->mobil->getDataPajak($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('pajak', $data);
    $this->load->view('templates/footer');
  }

  public function hapuspajak($id)
  {
    $this->mobil->hapusasuransi($id);
    redirect('pajak');
  }

  public function tambahmobil()
  {
    $data['judul'] = 'Tambah Mobil';
    $this->form_validation->set_rules('nopol', 'nopol', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('mobil/tambahmobil', $data);
      $this->load->view('templates/footer');
    } else {
      $this->mobil->tambahMobil();
      redirect('pajak');
    }
  }

  public function ubahpajak($id)
  {
    $data['judul'] = 'Ubah Pajak';
    $data['pajak'] = $this->mobil->getDataPajakById($id);
    $this->form_validation->set_rules('nopol', 'nopol', 'required');
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('stnk', 'stnk', 'required');
    $this->form_validation->set_rules('polis', 'polis', 'required');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('pajak/ubahpajak', $data);
      $this->load->view('templates/footer');
    } else {
      $this->mobil->ubahPajak($id);
      redirect('pajak');
    }
  }
}
