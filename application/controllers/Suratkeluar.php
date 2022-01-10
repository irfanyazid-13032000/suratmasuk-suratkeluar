<?php
class Suratkeluar extends CI_Controller
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

    $data['judul'] = 'Surat Keluar';
    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $config['total_rows'] = $this->suratmenyurat->getJumlahDataSuratKeluar($data['keyword']);

    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;

    $config['base_url'] = base_url() . '/suratkeluar/index/';

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

    $data['suratkeluar'] = $this->suratmenyurat->getDataSuratKeluar($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav');
    $this->load->view('surat/suratkeluar', $data);
    $this->load->view('templates/footer');
  }


  public function tambahsuratkeluar()
  {
    $data['judul'] = 'Tambah Surat Keluar';
    // $data['unit'] = ['Jasa Keuangan Syariah', 'Jasa', 'SDM & Umum', 'Pengadaan Barang & Jasa', 'Perdagangan', 'Akuntansi'];
    $data['nomor_surat_keluar'] = $this->suratmenyurat->ambilNomorSuratKeluar();

    $config['upload_path']          = './uploads/suratkeluar';
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
      $this->load->view('surat/tambahsuratkeluar', $data, $error);
      $this->load->view('templates/footer');
    } else {
      $this->suratmenyurat->tambahsuratkeluar();
      $this->suratmenyurat->tambahNomorSuratKeluar();
      redirect('suratkeluar');
    }
  }



  public function ubahsuratkeluar($id)
  {
    $data['judul'] = 'Ubah Surat Keluar';
    $data['unit'] = ['Jasa Keuangan Syariah', 'Jasa', 'SDM & Umum', 'Pengadaan Barang & Jasa', 'Perdagangan', 'Akuntansi'];
    $data['suratkeluar'] = $this->suratmenyurat->getDataSuratKeluarById($id);

    $config['upload_path']          = './uploads/suratkeluar';
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
      $this->load->view('surat/ubahsuratkeluar', $data);
      $this->load->view('templates/footer');
    } else {
      $this->suratmenyurat->ubahsuratkeluar($id);
      redirect('suratkeluar');
    }
  }

  public function hapussuratkeluar($id)
  {
    $this->suratmenyurat->hapussuratkeluar($id);
    redirect('suratkeluar');
  }

  public function download($id)
  {
    $berkas = $this->suratmenyurat->getDataSuratKeluarById($id);
    force_download('uploads/suratkeluar/' . $berkas['nama_berkas'], NULL);
  }
}
