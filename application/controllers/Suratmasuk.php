<?php
class Suratmasuk extends CI_Controller
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
    if ($this->input->post('klik')) {
      $teha = $this->input->post('klik');
      $this->session->set_userdata('filter', $teha);
    }

    if ($this->input->post('urutan')) {
      $urutan = $this->input->post('urutan');
      $this->session->set_userdata('descku', $urutan);
      var_dump($this->session->userdata('descku'));
    }

    $data['judul'] = 'surat masuk';
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->suratmenyurat->getJumlahDataSuratMasuk($data['keyword']);

    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;

    $config['base_url'] = base_url() . '/suratmasuk/index/';

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

    $data['suratmasuk'] = $this->suratmenyurat->getDataSuratMasuk($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav');
    $this->load->view('surat/suratmasuk', $data);
    $this->load->view('templates/footer');
  }

  public function tambahsuratmasuk()
  {

    $data['judul'] = 'Tambah Surat Masuk';

    $data['nomor_surat_masuk'] = $this->suratmenyurat->mengambilNomorSuratMasuk();



    $config['upload_path']          = './uploads/suratmasuk';
    $config['allowed_types']        = 'docx|pdf|doc|xls';
    $config['max_size']             = 100000000;


    $this->load->library('upload', $config);

    $this->form_validation->set_rules('unit', 'tanggal', 'required');
    $this->form_validation->set_rules('kode', 'kode', 'required');
    $this->form_validation->set_rules('unit', 'unit', 'required');
    $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('perihal', 'perihal', 'required');
    $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
    if ($this->form_validation->run() === false) {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('templates/header', $data);
      $this->load->view('templates/nav');
      $this->load->view('surat/tambahsuratmasuk', $data, $error);
      $this->load->view('templates/footer');
    } else {
      $this->suratmenyurat->tambahsuratmasuk();
      $this->suratmenyurat->tambahNomorSuratMasuk();
      redirect('suratmasuk');
    }
  }

  public function ubahasuratmasuk($id)
  {
    $data['judul'] = 'Ubah Surat Masuk';
    $data['unit'] = ['Jasa Keuangan Syariah', 'Jasa', 'SDM & Umum', 'Pengadaan Barang & Jasa', 'Perdagangan', 'Akuntansi'];
    $data['suratmasuk'] = $this->suratmenyurat->getDataSuratMasukById($id);

    $config['upload_path']          = './uploads/suratmasuk';
    $config['allowed_types']        = 'docx|pdf|doc|xls';
    $config['max_size']             = 100000000;

    $this->load->library('upload', $config);


    $this->form_validation->set_rules('unit', 'tanggal', 'required');
    $this->form_validation->set_rules('kode', 'kode', 'required');
    $this->form_validation->set_rules('unit', 'unit', 'required');
    $this->form_validation->set_rules('nomor_surat', 'nomor surat', 'required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_rules('perihal', 'perihal', 'required');
    $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/nav');
      $this->load->view('surat/ubahsuratmasuk', $data);
      $this->load->view('templates/footer');
    } else {
      $this->suratmenyurat->ubahsuratmasuk($id);
      redirect('suratmasuk');
    }
  }

  public function hapussuratmasuk($id)
  {
    $this->suratmenyurat->hapussuratmasuk($id);
    redirect('suratmasuk');
  }

  public function download($id)
  {
    $berkas = $this->suratmenyurat->getDataSuratMasukById($id);
    force_download('uploads/suratmasuk/' . $berkas['nama_berkas'], NULL);
  }

  public function descendingan()
  {
    if ($this->input->post('urutan')) {
      $urutan = $this->input->post('urutan');
      $this->session->set_userdata('descku', $urutan);
      var_dump($this->session->userdata('descku'));
    }
  }
}
