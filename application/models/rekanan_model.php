<?php
class rekanan_model extends CI_Model
{
  public function getJumlahDataRekanan($keyword)
  {
    if ($keyword) {
      $this->db->like('perusahaan', $keyword);
    }
    return $this->db->get('rekanan')->num_rows();
  }

  public function getDataRekanan($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->order_by('perusahaan', 'ASC');
      $this->db->like('perusahaan', $keyword);
    }

    return $this->db->get('rekanan', $limit, $start)->result_array();
  }

  public function rekananforeach()
  {
    return $this->db->get('rekanan')->result_array();
  }


  public function tambahrekanan()
  {
    $data = [
      'perusahaan' => $this->input->post('perusahaan'),
      'telepon' => $this->input->post('telepon')
    ];
    $this->db->insert('rekanan', $data);
  }

  public function getDataRekananByid($id)
  {
    return $this->db->get_where('rekanan', ['id' => $id])->row_array();
  }

  public function ubahrekanan($id)
  {
    $data = [
      'perusahaan' => $this->input->post('perusahaan'),
      'telepon' => $this->input->post('telepon')
    ];

    $this->db->where('id', $id);
    $this->db->update('rekanan', $data);
  }

  public function hapusrekanan($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('rekanan');
  }
}
