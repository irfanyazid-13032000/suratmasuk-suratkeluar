<?php
class Close extends CI_Controller
{
  public function index()
  {
    $this->session->sess_destroy('tglmulai');
    $this->session->sess_destroy('tglselesai');

    redirect(base_url('kendaraan'));
  }

  public function tampilkandata($urisegment1)
  {
    $this->session->unset_userdata('keyword');
    redirect(base_url($urisegment1));
  }

  public function filter($urisegment1)
  {
    $this->session->unset_userdata('filter');
    $this->session->unset_userdata('descku');
    redirect($urisegment1);
  }





  public function logout()
  {
    $this->session->sess_destroy('nama');
    redirect(base_url('halo'));
  }
}
