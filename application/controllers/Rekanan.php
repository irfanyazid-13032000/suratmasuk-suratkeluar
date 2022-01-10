<?php
class Rekanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('rekanan_model');
    if (!$this->session->userdata('nama')) {
      redirect('halo');
    }
  }



  public function index()
  {
    $data['judul'] = 'Rekanan';

    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->rekanan_model->getJumlahDataRekanan($data['keyword']);


    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = base_url() . '/rekanan/index/';



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

    $data['rekanan'] = $this->rekanan_model->getDataRekanan($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('rekanan', $data);
    $this->load->view('templates/footer');
  }

  public function tambahrekanan()
  {
    $this->rekanan_model->tambahrekanan();
    redirect('rekanan');
  }

  public function ubahrekanan($id)
  {
    $data['judul'] = 'Ubah Rekanan';
    $data['rekanan'] = $this->rekanan_model->getDataRekananByid($id);

    $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('rekanan/ubahrekanan', $data);
      $this->load->view('templates/footer');
    } else {
      $this->rekanan_model->ubahrekanan($id);
      redirect('rekanan');
    }
  }

  public function hapusrekanan($id)
  {
    $this->rekanan_model->hapusrekanan($id);
    echo "<script>alert('Data Rekanan Berhasil Dihapus')</script>";
    redirect('rekanan');
  }
}
