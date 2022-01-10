<?php
class perjanjian_model extends CI_Model
{
  public function getDataPerjanjian($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->order_by('no_perjanjian', 'ASC');
      $this->db->like('no_perjanjian', $keyword);
      $this->db->or_like('no_adendum', $keyword);
      $this->db->or_like('no_pk', $keyword);
      $this->db->or_like('rekanan', $keyword);
      $this->db->or_like('jenis_perjanjian', $keyword);
      $this->db->or_like('awal', $keyword);
      $this->db->or_like('akhir', $keyword);
      $this->db->or_like('status_perjanjian', $keyword);
      $this->db->or_like('objek_perjanjian', $keyword);
      $this->db->or_like('jumlah_unit', $keyword);
      $this->db->or_like('sewa_unit_perbulan', $keyword);
      $this->db->or_like('total_sewa_perbulan', $keyword);
      $this->db->or_like('lokasi', $keyword);
      $this->db->or_like('keterangan', $keyword);
      return $this->db->get('perjanjian', $limit, $start)->result_array();
    } else {
      $this->db->order_by('no_perjanjian', 'ASC');
      return $this->db->get('perjanjian', $limit, $start)->result_array();
    }
  }

  public function getJumlahDataPerjanjian($keyword)
  {
    if ($keyword) {
      $this->db->like('no_perjanjian', $keyword);
      $this->db->or_like('no_adendum', $keyword);
      $this->db->or_like('no_pk', $keyword);
      $this->db->or_like('rekanan', $keyword);
      $this->db->or_like('jenis_perjanjian', $keyword);
      $this->db->or_like('awal', $keyword);
      $this->db->or_like('akhir', $keyword);
      $this->db->or_like('status_perjanjian', $keyword);
      $this->db->or_like('objek_perjanjian', $keyword);
      $this->db->or_like('jumlah_unit', $keyword);
      $this->db->or_like('sewa_unit_perbulan', $keyword);
      $this->db->or_like('total_sewa_perbulan', $keyword);
      $this->db->or_like('lokasi', $keyword);
      $this->db->or_like('keterangan', $keyword);
      return $this->db->get('perjanjian')->num_rows();
    } else {
      return $this->db->get('perjanjian')->num_rows();
    }
  }

  public function tambahPerjanjian()
  {
    $data = [
      'no_perjanjian' => $this->input->post('no_perjanjian'),
      'no_adendum' => $this->input->post('no_adendum'),
      'no_pk' => $this->input->post('no_pk'),
      'rekanan' => $this->input->post('rekanan'),
      'jenis_perjanjian' => $this->input->post('jenis_perjanjian'),
      'awal' => $this->input->post('awal'),
      'akhir' => $this->input->post('akhir'),
      'status_perjanjian' => $this->input->post('status_perjanjian'),
      'objek_perjanjian' => $this->input->post('objek_perjanjian'),
      'jumlah_unit' => $this->input->post('jumlah_unit'),
      'sewa_unit_perbulan' => $this->input->post('sewa_unit_perbulan'),
      'total_sewa_perbulan' => $this->input->post('jumlah_unit') * $this->input->post('sewa_unit_perbulan'),
      'lokasi' => $this->input->post('lokasi'),
      'keterangan' => $this->input->post('keterangan')
    ];

    // $arey =  array_pop(explode('.', $_FILES['berkas']['name']));
    // $data['nama_berkas'] = implode('_',$arey) . '.' . end(explode('.', $_FILES['berkas']['name']));
    $namaberkas = explode('.', $_FILES['berkas']['name']);
    array_pop($namaberkas);
    $berkasname = explode('.', $_FILES['berkas']['name']);
    $ekstensi = end($berkasname);
    $data['nama_berkas'] = implode('_', $namaberkas) . '.' . $ekstensi;

    $this->db->insert('perjanjian', $data);
  }

  public function getDataPerjanjianById($id)
  {
    return $this->db->get_where('perjanjian', ['id_perjanjian' => $id])->row_array();
  }

  public function ubahPerjanjian($id)
  {
    $data = [
      'no_perjanjian' => $this->input->post('no_perjanjian'),
      'no_adendum' => $this->input->post('no_adendum'),
      'no_pk' => $this->input->post('no_pk'),
      'rekanan' => $this->input->post('rekanan'),
      'jenis_perjanjian' => $this->input->post('jenis_perjanjian'),
      'awal' => $this->input->post('awal'),
      'akhir' => $this->input->post('akhir'),
      'status_perjanjian' => $this->input->post('status_perjanjian'),
      'objek_perjanjian' => $this->input->post('objek_perjanjian'),
      'jumlah_unit' => $this->input->post('jumlah_unit'),
      'sewa_unit_perbulan' => $this->input->post('sewa_unit_perbulan'),
      'total_sewa_perbulan' => $this->input->post('jumlah_unit') * $this->input->post('sewa_unit_perbulan'),
      'lokasi' => $this->input->post('lokasi'),
      'keterangan' => $this->input->post('keterangan')
    ];

    $this->db->where('id_perjanjian', $id);
    $this->db->update('perjanjian', $data);
  }

  public function hapusperjanjian($id)
  {
    $this->db->where('id_perjanjian', $id);
    $this->db->delete('perjanjian');
  }

  public function getDataExportExcelPerjanjian($keyword)
  {
    if ($keyword) {
      $this->db->order_by('no_perjanjian', 'ASC');
      $this->db->like('no_perjanjian', $keyword);
      $this->db->or_like('no_adendum', $keyword);
      $this->db->or_like('no_pk', $keyword);
      $this->db->or_like('rekanan', $keyword);
      $this->db->or_like('jenis_perjanjian', $keyword);
      $this->db->or_like('awal', $keyword);
      $this->db->or_like('akhir', $keyword);
      $this->db->or_like('status_perjanjian', $keyword);
      $this->db->or_like('objek_perjanjian', $keyword);
      $this->db->or_like('jumlah_unit', $keyword);
      $this->db->or_like('sewa_unit_perbulan', $keyword);
      $this->db->or_like('total_sewa_perbulan', $keyword);
      $this->db->or_like('lokasi', $keyword);
      $this->db->or_like('keterangan', $keyword);
    }
    return $this->db->get('perjanjian')->result_array();
  }

  public function getDataPerjanjianDistinct()
  {
    return $this->db->query("SELECT DISTINCT no_perjanjian FROM perjanjian")->result_array();
  }
}
