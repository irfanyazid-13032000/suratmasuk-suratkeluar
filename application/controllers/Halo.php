<?php
class Halo extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = 'Login Surat Menyurat';
    // jika ada session nama itu berarti sudah login
    if ($this->session->userdata('nama')) {
      $data['judul'] = 'Dashboard';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/nav');
      $this->load->view('templates/dashboard');
      $this->load->view('templates/footer');
    } else {
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      if ($this->form_validation->run() === false) {
        $this->load->view('login', $data);
      } else {
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        // cek apakah ada di database user
        $user = $this->db->get_where('user', ['nama' => $nama])->row_array();
        // jika user ada
        if ($user) {
          // jika password yang diinpukan sama dengan password yang di query kan maka berhasil masuk
          if ($password === $user['password']) {
            $this->session->set_userdata('nama', $user['nama']);
            $this->session->set_userdata('unit', $user['unit']);
            redirect('halo');
          } else {
            // jika password yang diinputkan berbeda dengan password yang di query kan maka gagal masuk
            $this->session->set_flashdata('pesankebenaran', '<div class="alert alert-danger" role="alert">password anda salah</div>');
            redirect('halo');
          }
        }
        // jika user tidak ada
        else {
          $this->session->set_flashdata('pesankebenaran', '<div class="alert alert-danger" role="alert">username tidak ada</div>');
          redirect('halo');
        }
      }
    }
  }
}
