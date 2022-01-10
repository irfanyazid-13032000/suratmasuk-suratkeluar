<?php
class User_model extends CI_Model
{

  public function getDataUser($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->like('unit', $keyword);
      $this->db->or_like('nama', $keyword);
    }
    $this->db->order_by('nama');
    return $this->db->get('user', $limit, $start)->result_array();
  }


  public function getJumlahDataUser($keyword)
  {
    if ($keyword) {
      $this->db->like('unit', $keyword);
      $this->db->or_like('nama', $keyword);
    }
    return $this->db->get('user')->num_rows();
  }

  public function getUserById($id)
  {
    return $this->db->get_where('user', ['id_user' => $id])->row_array();
  }

  public function tambahuser()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'password' => $this->input->post('password'),
      'unit' => $this->input->post('unit')
    ];

    $this->db->insert('user', $data);
  }

  public function ubahUser($id)
  {

    $data = [
      'nama' => $this->input->post('nama'),
      'password' => $this->input->post('password'),
      'unit' => $this->input->post('unit')
    ];


    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
  }

  public function hapususer($id)
  {
    $this->db->delete('user', ['id_user' => $id]);
  }

  public function getProfil()
  {
    return $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
    // return $this->db->get('user')->row_array();
  }

  public function ubahdatadiri()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'password' => $this->input->post('password'),
      'unit' => $this->input->post('unit')
    ];


    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user', $data);
  }
}
