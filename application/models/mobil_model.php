<?php
class mobil_model extends CI_Model
{
  public function getDataAsuransi($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->like('nopol', $keyword);
      $this->db->or_like('tahun', $keyword);
      $this->db->or_like('merk', $keyword);
      $this->db->or_like('rangka', $keyword);
      $this->db->or_like('mesin', $keyword);
      $this->db->or_like('bahan_bakar', $keyword);
      $this->db->or_like('instansi', $keyword);
      $this->db->or_like('polis', $keyword);
      $this->db->or_like('pertanggungan', $keyword);
      $this->db->or_like('premi', $keyword);
      if ($this->session->userdata('filter')) {
        $this->db->order_by($this->session->userdata('filter'), 'ASC');
      } else {
        $this->db->order_by('tahun', 'ASC');
      }
      return $this->db->get('mobil', $limit, $start)->result_array();
    } else {
      if ($this->session->userdata('filter')) {
        $this->db->order_by($this->session->userdata('filter'), 'ASC');
      } else {
        $this->db->order_by('tahun', 'ASC');
      }
      return $this->db->get('mobil', $limit, $start)->result_array();
    }
  }


  public function getJumlahDataAsuransi($keyword)
  {
    if ($keyword) {
      $this->db->like('nopol', $keyword);
      $this->db->or_like('tahun', $keyword);
      $this->db->or_like('merk', $keyword);
      $this->db->or_like('rangka', $keyword);
      $this->db->or_like('mesin', $keyword);
      $this->db->or_like('bahan_bakar', $keyword);
      $this->db->or_like('instansi', $keyword);
      $this->db->or_like('polis', $keyword);
      $this->db->or_like('pertanggungan', $keyword);
      $this->db->or_like('premi', $keyword);
      return $this->db->get('mobil')->num_rows();
    } else {
      return $this->db->get('mobil')->num_rows();
    }
  }

  public function getDataAsuransiById($id)
  {
    return $this->db->get_where('mobil', ['id' => $id])->row_array();
  }

  public function ubahAsuransi($id)
  {
    $data = [
      'nopol' => $this->input->post('nopol'),
      'tahun' => $this->input->post('tahun'),
      'merk' => $this->input->post('merk'),
      'rangka' => $this->input->post('rangka'),
      'mesin' => $this->input->post('mesin'),
      'bahan_bakar' => $this->input->post('bahan_bakar'),
      'instansi' => $this->input->post('instansi'),
      'asuransi' => $this->input->post('asuransi'),
      'stnk' => $this->input->post('stnk'),
      'polis' => $this->input->post('polis'),
      'pertanggungan' => $this->input->post('pertanggungan'),
      'premi' => $this->input->post('premi'),
      'status' => $this->input->post('status')
    ];

    $this->db->where('id', $id);
    $this->db->update('mobil', $data);
  }

  public function tambahMobil()
  {
    $data = [
      'nopol' => $this->input->post('nopol'),
      'tahun' => $this->input->post('tahun'),
      'merk' => $this->input->post('merk'),
      'rangka' => $this->input->post('rangka'),
      'mesin' => $this->input->post('mesin'),
      'bahan_bakar' => $this->input->post('bahan_bakar'),
      'instansi' => $this->input->post('instansi'),
      'asuransi' => $this->input->post('asuransi'),
      'stnk' => $this->input->post('stnk'),
      'polis' => $this->input->post('polis'),
      'pertanggungan' => $this->input->post('pertanggungan'),
      'premi' => $this->input->post('premi'),
      'status' => $this->input->post('status')
    ];

    $this->db->insert('mobil', $data);
  }

  public function hapusasuransi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('mobil');
  }

  public function getDataExportExcelAsuransi($keyword)
  {
    if ($keyword) {
      $this->db->like('nopol', $keyword);
      $this->db->or_like('tahun', $keyword);
      $this->db->or_like('merk', $keyword);
      $this->db->or_like('rangka', $keyword);
      $this->db->or_like('mesin', $keyword);
      $this->db->or_like('bahan_bakar', $keyword);
      $this->db->or_like('instansi', $keyword);
      $this->db->or_like('polis', $keyword);
      $this->db->or_like('pertanggungan', $keyword);
      $this->db->or_like('premi', $keyword);
      $this->db->order_by('asuransi', 'ASC');
    }
    return $this->db->get('mobil')->result_array();
  }


  public function getDataPajak($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->like('nopol', $keyword);
      $this->db->or_like('tahun', $keyword);
      $this->db->or_like('merk', $keyword);
    }
    $this->db->order_by('stnk', 'ASC');
    $this->db->where('status', 'umum');
    return $this->db->get('mobil', $limit, $start)->result_array();
  }

  public function getJumlahDataPajak($keyword)
  {
    if ($keyword) {
      $this->db->like('nopol', $keyword);
      $this->db->or_like('tahun', $keyword);
      $this->db->or_like('merk', $keyword);
    }
    $this->db->where('status', 'umum');
    return $this->db->get('mobil')->num_rows();
  }

  public function getDataExportExcelPajak($keyword)
  {
    if ($keyword) {
      $this->db->like('nopol', $keyword);
      $this->db->or_like('tahun', $keyword);
      $this->db->or_like('merk', $keyword);
    }
    $this->db->order_by('stnk', 'ASC');
    $this->db->where('status', 'umum');
    return $this->db->get('mobil')->result_array();
  }

  public function getDataPajakById($id)
  {
    return $this->db->get_where('mobil', ['id' => $id])->row_array();
  }

  public function ubahPajak($id)
  {
    $data = [
      'nopol' => $this->input->post('nopol'),
      'tahun' => $this->input->post('tahun'),
      'merk' => $this->input->post('merk'),
      'stnk' => $this->input->post('stnk'),
      'polis' => $this->input->post('polis'),
    ];

    $this->db->where('id', $id);
    $this->db->update('mobil', $data);
  }
}
