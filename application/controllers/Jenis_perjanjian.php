<?php
class Jenis_perjanjian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('jenis_perjanjian_model', 'jenis_perjanjian');
    if (!$this->session->userdata('nama')) {
      redirect('halo');
    }
  }


  public function index()
  {
    $data['judul'] = 'Jenis Perjanjian';

    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->jenis_perjanjian->getJumlahJenisPerjanjian($data['keyword']);


    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = base_url() . '/jenis_perjanjian/index/';



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

    $data['jenis_perjanjian'] = $this->jenis_perjanjian->getDataJenisPerjanjianPagination($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('jenis_perjanjian', $data);
    $this->load->view('templates/footer');
  }

  public function tambahJenisPerjanjian()
  {
    $this->jenis_perjanjian->tambahJenisPerjanjian();
    redirect('jenis_perjanjian');
  }

  public function ubahjenisperjanjian($id)
  {
    $data['judul'] = 'Ubah Jenis Perjanjian';
    $data['jenis_perjanjian'] = $this->jenis_perjanjian->getDataJenisPerjanjianByid($id);

    $this->form_validation->set_rules('nama_perjanjian', 'Nama Perjanjian', 'required');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('jenisperjanjian/ubahjenisperjanjian', $data);
      $this->load->view('templates/footer');
    } else {
      $this->jenis_perjanjian->ubahjenisperjanjian($id);
      redirect('jenis_perjanjian');
    }
  }

  public function hapusjenisperjanjian($id)
  {
    $this->jenis_perjanjian->hapusjenisperjanjian($id);
    redirect('jenis_perjanjian');
  }
}
