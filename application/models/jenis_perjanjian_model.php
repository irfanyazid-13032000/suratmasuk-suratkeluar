<?php
class jenis_perjanjian_model extends CI_Model
{
  public function getJumlahJenisPerjanjian($keyword)
  {
    if ($keyword) {
      $this->db->like('nama_perjanjian', $keyword);
    }
    return $this->db->get('jenis_perjanjian')->num_rows();
  }

  public function getDataJenisPerjanjianPagination($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->order_by('nama_perjanjian', 'ASC');
      $this->db->like('nama_perjanjian', $keyword);
    }
    return $this->db->get('jenis_perjanjian', $limit, $start)->result_array();
  }

  public function tambahJenisPerjanjian()
  {
    $data = [
      'nama_perjanjian' => $this->input->post('nama_perjanjian')
    ];
    $this->db->insert('jenis_perjanjian', $data);
  }

  public function getDataJenisPerjanjianByid($id)
  {
    return $this->db->get_where('jenis_perjanjian', ['id' => $id])->row_array();
  }

  public function ubahjenisperjanjian($id)
  {
    $data = [
      'nama_perjanjian' => $this->input->post('nama_perjanjian')
    ];

    $this->db->where('id', $id);
    $this->db->update('jenis_perjanjian', $data);
  }

  public function hapusjenisperjanjian($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('jenis_perjanjian');
  }

  public function jenisperjanjianforeach()
  {
    return $this->db->get('jenis_perjanjian')->result_array();
  }
}
