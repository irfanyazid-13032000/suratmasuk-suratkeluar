<?php
class User extends CI_Controller
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
    $data['judul'] = 'Pegawai KKUSB';

    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $config['total_rows'] = $this->user->getJumlahDataUser($data['keyword']);

    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;

    $config['base_url'] = base_url() . '/user/index/';

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

    $data['datauser'] = $this->user->getDataUser($config['per_page'], $data['start'], $data['keyword']);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav');
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }


  public function tambahuser()
  {
    $data['judul'] = 'Tambah Pegawai';
    $data['unit'] = ['Jasa Keuangan Syariah', 'Jasa', 'SDM & Umum', 'Pengadaan Barang & Jasa', 'Perdagangan', 'Akuntansi'];
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('unit', 'unit', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/nav');
      $this->load->view('user/tambahuser', $data);
      $this->load->view('templates/footer');
    } else {
      $this->user->tambahuser();
      redirect('user');
    }
  }



  public function ubahuser($id)
  {
    $data['judul'] = 'Ubah Pegawai';
    $data['user'] = $this->user->getUserById($id);
    $data['unit'] = ['Jasa Keuangan Syariah', 'Jasa', 'SDM & Umum', 'Pengadaan Barang & Jasa', 'Perdagangan', 'Akuntansi'];

    $this->form_validation->set_rules('unit', 'unit', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/nav');
      $this->load->view('user/ubahuser', $data);
      $this->load->view('templates/footer');
    } else {
      $this->user->ubahUser($id);
      redirect('user');
    }
  }

  public function hapususer($id)
  {
    $this->user->hapususer($id);
    redirect('user');
  }
}
