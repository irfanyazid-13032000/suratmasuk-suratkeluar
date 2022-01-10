<?php
class Asuransi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mobil_model', 'mobil');
  }

  public function index()
  {
    if ($this->input->post('klik')) {
      $teha = $this->input->post('klik');
      $this->session->set_userdata('filter', $teha);
    }
    
    var_dump($this->session->userdata('filter'));

    $data['judul'] = 'Asuransi';
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->mobil->getJumlahDataAsuransi($data['keyword']);

    $data['pencarian'] = $config['total_rows'];


    $config['per_page'] = 10;

    $config['base_url'] = base_url() . '/asuransi/index/';

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

    $data['asuransi'] = $this->mobil->getDataAsuransi($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('asuransi', $data);
    $this->load->view('templates/footer');
  }

  public function perlihatkan()
  {
    if ($this->input->post('klik')) {
      $teha = $this->input->post('klik');
      $this->session->set_userdata('filter', $teha);
      var_dump($teha);
    }
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
      redirect('asuransi');
    }
  }

  public function hapusasuransi($id)
  {
    $this->mobil->hapusasuransi($id);
    if ($this->uri->segment(1) === 'asuransi') {
      redirect('asuransi');
    } else {
      redirect('pajak');
    }
  }

  public function ubahasuransi($id)
  {
    $data['judul'] = 'Ubah Asuransi';
    $data['asuransi'] = $this->mobil->getDataAsuransiById($id);
    $this->form_validation->set_rules('nopol', 'nopol', 'required');
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    $this->form_validation->set_rules('merk', 'merk', 'required');
    $this->form_validation->set_rules('rangka', 'rangka', 'required');
    $this->form_validation->set_rules('mesin', 'mesin', 'required');
    $this->form_validation->set_rules('bahan_bakar', 'bahan_bakar', 'required');
    $this->form_validation->set_rules('instansi', 'instansi', 'required');
    $this->form_validation->set_rules('asuransi', 'asuransi', 'required');
    $this->form_validation->set_rules('polis', 'polis', 'required');
    $this->form_validation->set_rules('pertanggungan', 'pertanggungan', 'required');
    $this->form_validation->set_rules('premi', 'premi', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('asuransi/ubahasuransi', $data);
      $this->load->view('templates/footer');
    } else {
      $this->mobil->ubahAsuransi($id);
      redirect('asuransi');
    }
  }
}
