<?php
class Perjanjian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('perjanjian_model');
    $this->load->model('rekanan_model');
    $this->load->model('jenis_perjanjian_model');
    $this->load->helper('download');
    if (!$this->session->userdata('nama')) {
      redirect('halo');
    }
  }


  public function index()
  {
    $data['judul'] = 'Perjanjian';

    if ($this->input->post('keyword')) {
      $data['keyword'] =  $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }
    $config['total_rows'] = $this->perjanjian_model->getJumlahDataPerjanjian($data['keyword']);


    $data['pencarian'] = $config['total_rows'];

    $config['per_page'] = 10;
    $config['base_url'] = base_url() . '/perjanjian/index/';



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

    // $data['start'] = $this->uri->segment(3);

    $data['perjanjian'] = $this->perjanjian_model->getDataPerjanjian($config['per_page'], $data['start'], $data['keyword']);
    $data['jumlah_no_perjanjian'] = count($this->perjanjian_model->getDataPerjanjianDistinct());

    // jika jatuh tempo : ubah status perjanjian yang awalnya dari Y menjadi N
    for ($i = 0; $i < count($data['perjanjian']); $i++) {
      if ($data['perjanjian'][$i]['akhir'] <= date('Y-m-d')) {
        $this->db->where('akhir', $data['perjanjian'][$i]['akhir']);
        $this->db->update('perjanjian', ['status_perjanjian' => 'N']);
      }
    }




    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('perjanjian', $data);
    $this->load->view('templates/footer');
  }

  public function tambahPerjanjian()
  {
    $data['judul'] = "Tambah Perjanjian";
    $data['rekanan'] = $this->rekanan_model->rekananforeach();
    $data['jenis_perjanjian'] = $this->jenis_perjanjian_model->jenisperjanjianforeach();

    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'docx|pdf|doc|xls';
    $config['max_size']             = 100000000;
    // $config['file_name'] = $_FILES['berkas']['name'];
    $this->load->library('upload', $config);



    $this->form_validation->set_rules('no_perjanjian', 'nomor perjanjian', 'required');
    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('perjanjian/tambahperjanjian', $data, $error);
      $this->load->view('templates/footer');
    } else {
      $this->perjanjian_model->tambahPerjanjian();
      redirect('perjanjian');
    }
  }

  public function ubahperjanjian($id)
  {
    $data['judul'] = 'Ubah Perjanjian';
    $data['perjanjian'] = $this->perjanjian_model->getDataPerjanjianById($id);
    $data['jenis_perjanjian'] = $this->jenis_perjanjian_model->jenisperjanjianforeach();


    $this->form_validation->set_rules('no_perjanjian', 'nomor perjanjian', 'required');
    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('perjanjian/ubahperjanjian', $data);
      $this->load->view('templates/footer');
    } else {
      $this->perjanjian_model->ubahPerjanjian($id);
      redirect('perjanjian');
    }
  }

  public function ubahkeaktifan()
  {
    $id_keaktifan = $this->input->post('id_keaktifan');
    $keaktifan = $this->input->post('keaktifan');

    if ($keaktifan === 'aktif') {
      $this->db->where('id_perjanjian', $id_keaktifan);
      $this->db->update('perjanjian', ['keaktifan' => 'nonaktif']);
    } else {
      $this->db->where('id_perjanjian', $id_keaktifan);
      $this->db->update('perjanjian', ['keaktifan' => 'aktif']);
    }
  }


  public function hapusperjanjian($id)
  {
    $this->perjanjian_model->hapusperjanjian($id);
    echo '<script>alert("Anda Telah Menghapus Data")</script>';
    redirect('perjanjian');
  }

  public function download($id)
  {
    $berkas = $this->db->get_where('perjanjian', ['id_perjanjian' => $id])->row_array();
    force_download('uploads/' . $berkas['nama_berkas'], NULL);
  }
}
