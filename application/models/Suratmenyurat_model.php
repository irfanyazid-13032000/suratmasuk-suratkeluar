<?php
class Suratmenyurat_model extends CI_Model
{
  public function getDataSuratMasuk($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->like('tanggal', $keyword);
      $this->db->or_like('kode', $keyword);
      $this->db->or_like('unit', $keyword);
      $this->db->or_like('nomor_surat', $keyword);
      $this->db->or_like('perihal', $keyword);
      $this->db->or_like('tujuan', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_berkas', $keyword);
      if ($this->session->userdata('filter')) {
        if ($this->session->userdata('descku')) {
          $this->db->order_by($this->session->userdata('filter'), 'DESC');
        } else {
          $this->db->order_by($this->session->userdata('filter'), 'ASC');
        }
      } else {
        if ($this->session->userdata('descku')) {
          $this->db->order_by('tanggal', 'DESC');
        } else {
          $this->db->order_by('tanggal', 'ASC');
        }
      }
      return $this->db->get('suratmasuk', $limit, $start)->result_array();
    } else {
      if ($this->session->userdata('filter')) {
        if ($this->session->userdata('descku')) {
          $this->db->order_by($this->session->userdata('filter'), 'DESC');
        } else {
          $this->db->order_by($this->session->userdata('filter'), 'ASC');
        }
      } else {
        if ($this->session->userdata('descku')) {
          $this->db->order_by('tanggal', 'DESC');
        } else {
          $this->db->order_by('tanggal', 'ASC');
        }
      }
      return $this->db->get('suratmasuk', $limit, $start)->result_array();
    }
  }

  public function getJumlahDataSuratMasuk($keyword)
  {
    if ($keyword) {
      $this->db->like('tanggal', $keyword);
      $this->db->or_like('kode', $keyword);
      $this->db->or_like('unit', $keyword);
      $this->db->or_like('nomor_surat', $keyword);
      $this->db->or_like('perihal', $keyword);
      $this->db->or_like('tujuan', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_berkas', $keyword);
      return $this->db->get('suratmasuk')->num_rows();
    } else {
      return $this->db->get('suratmasuk')->num_rows();
    }
  }

  public function tambahsuratmasuk()
  {
    $data = [
      'tanggal' => $this->input->post('tanggal'),
      'kode' => $this->input->post('kode'),
      'unit' => $this->input->post('unit'),
      'nomor_surat' => $this->input->post('nomor_surat'),
      'perihal' => $this->input->post('perihal'),
      'tujuan' => $this->input->post('tujuan'),
      'keterangan' => $this->input->post('keterangan')
    ];

    if ($this->upload->do_upload('berkas')) {
      // $namaberkas = explode('.', $_FILES['berkas']['name']);
      // array_pop($namaberkas);
      // $berkasname = explode('.', $_FILES['berkas']['name']);
      // $ekstensi = end($berkasname);
      // $data['nama_berkas'] = implode('_', $namaberkas) . '.' . $ekstensi;
      $delimiter = [" ", "."];
      $namafile = str_replace($delimiter, $delimiter[1], $_FILES['berkas']['name']);
      $namafileDalamArray = explode(".", $namafile);
      $ekstensifile = end($namafileDalamArray);
      array_pop($namafileDalamArray);
      $data['nama_berkas'] = implode("_", $namafileDalamArray) . "." . $ekstensifile;
    } else {
      $data['nama_berkas'] = 'Kosong';
    }


    $this->db->insert('suratmasuk', $data);
  }


  public function mengambilNomorSuratMasuk()
  {
    return $this->db->query("SELECT MAX(nomor_surat_masuk) FROM no_surat_masuk")->row_array();
  }

  public function tambahNomorSuratMasuk()
  {
    $this->db->insert('no_surat_masuk', ['nomor_surat_masuk' => $this->input->post('kode')]);
  }


  public function getDataSuratMasukById($id)
  {
    return $this->db->get_where('suratmasuk', ['id_surat_masuk' => $id])->row_array();
  }

  public function ubahsuratmasuk($id)
  {
    $data = [
      'tanggal' => $this->input->post('tanggal'),
      'kode' => $this->input->post('kode'),
      'unit' => $this->input->post('unit'),
      'nomor_surat' => $this->input->post('nomor_surat'),
      'perihal' => $this->input->post('perihal'),
      'tujuan' => $this->input->post('tujuan'),
      'keterangan' => $this->input->post('keterangan')
    ];

    if ($this->upload->do_upload('berkas')) {
      $delimiter = [" ", "."];
      $namafile = str_replace($delimiter, $delimiter[1], $_FILES['berkas']['name']);
      $namafileDalamArray = explode(".", $namafile);
      $ekstensifile = end($namafileDalamArray);
      array_pop($namafileDalamArray);
      $data['nama_berkas'] = implode("_", $namafileDalamArray) . "." . $ekstensifile;
    }

    $this->db->where('id_surat_masuk', $id);
    $this->db->update('suratmasuk', $data);
  }

  public function hapussuratmasuk($id)
  {
    $this->db->delete('suratmasuk', ['id_surat_masuk' => $id]);
  }

  public function ubahnomorsuratmasuk()
  {
    $this->db->query("DELETE FROM no_surat_masuk");
    $this->db->insert('no_surat_masuk', ['nomor_surat_masuk' => $this->input->post('no_surat_masuk') - 1]);
  }



  // ini adalah pembatas antara surat masuk dan surat keluar perhatikannnnnnnnnnnnnnnnnnnnnnnnnnnn!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  public function getDataSuratKeluar($limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->like('tanggal', $keyword);
      $this->db->or_like('kode', $keyword);
      $this->db->or_like('unit', $keyword);
      $this->db->or_like('nomor_surat', $keyword);
      $this->db->or_like('perihal', $keyword);
      $this->db->or_like('tujuan', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_berkas', $keyword);
      if ($this->session->userdata('filter')) {
        if ($this->session->userdata('descku')) {
          $this->db->order_by($this->session->userdata('filter'), 'DESC');
        } else {
          $this->db->order_by($this->session->userdata('filter'), 'ASC');
        }
      } else {
        if ($this->session->userdata('descku')) {
          $this->db->order_by('tanggal', 'DESC');
        } else {
          $this->db->order_by('tanggal', 'ASC');
        }
      }
      return $this->db->get('suratkeluar', $limit, $start)->result_array();
    } else {
      if ($this->session->userdata('filter')) {
        if ($this->session->userdata('descku')) {
          $this->db->order_by($this->session->userdata('filter'), 'DESC');
        } else {
          $this->db->order_by($this->session->userdata('filter'), 'ASC');
        }
      } else {
        if ($this->session->userdata('descku')) {
          $this->db->order_by('tanggal', 'DESC');
        } else {
          $this->db->order_by('tanggal', 'ASC');
        }
      }
      return $this->db->get('suratkeluar', $limit, $start)->result_array();
    }
  }



  public function getJumlahDataSuratKeluar($keyword)
  {
    if ($keyword) {
      $this->db->like('tanggal', $keyword);
      $this->db->or_like('kode', $keyword);
      $this->db->or_like('unit', $keyword);
      $this->db->or_like('nomor_surat', $keyword);
      $this->db->or_like('perihal', $keyword);
      $this->db->or_like('tujuan', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_berkas', $keyword);
      return $this->db->get('suratkeluar')->num_rows();
    } else {
      return $this->db->get('suratkeluar')->num_rows();
    }
  }


  public function tambahsuratkeluar()
  {
    $data = [
      'tanggal' => $this->input->post('tanggal'),
      'kode' => $this->input->post('kode'),
      'unit' => $this->input->post('unit'),
      'nomor_surat' => $this->input->post('nomor_surat'),
      'perihal' => $this->input->post('perihal'),
      'tujuan' => $this->input->post('tujuan'),
      'keterangan' => $this->input->post('keterangan')
    ];

    if ($this->upload->do_upload('berkas')) {
      $delimiter = [" ", "."];
      $namafile = str_replace($delimiter, $delimiter[1], $_FILES['berkas']['name']);
      $namafileDalamArray = explode(".", $namafile);
      $ekstensifile = end($namafileDalamArray);
      array_pop($namafileDalamArray);
      $data['nama_berkas'] = implode("_", $namafileDalamArray) . "." . $ekstensifile;
    } else {
      $data['nama_berkas'] = 'Kosong';
    }

    $this->db->insert('suratkeluar', $data);
  }

  public function ambilNomorSuratKeluar()
  {
    return $this->db->query("SELECT MAX(nomor_surat_keluar) FROM no_surat_keluar")->row_array();
  }

  public function tambahNomorSuratKeluar()
  {
    $this->db->insert('no_surat_keluar', ['nomor_surat_keluar' => $this->input->post('kode')]);
  }

  public function getDataSuratKeluarById($id)
  {
    return $this->db->get_where('suratkeluar', ['id_surat_keluar' => $id])->row_array();
  }


  public function ubahsuratkeluar($id)
  {
    $data = [
      'tanggal' => $this->input->post('tanggal'),
      'kode' => $this->input->post('kode'),
      'unit' => $this->input->post('unit'),
      'nomor_surat' => $this->input->post('nomor_surat'),
      'perihal' => $this->input->post('perihal'),
      'tujuan' => $this->input->post('tujuan'),
      'keterangan' => $this->input->post('keterangan')
    ];

    if ($this->upload->do_upload('berkas')) {
      $delimiter = [" ", "."];
      $namafile = str_replace($delimiter, $delimiter[1], $_FILES['berkas']['name']);
      $namafileDalamArray = explode(".", $namafile);
      $ekstensifile = end($namafileDalamArray);
      array_pop($namafileDalamArray);
      $data['nama_berkas'] = implode("_", $namafileDalamArray) . "." . $ekstensifile;
    }

    $this->db->where('id_surat_keluar', $id);
    $this->db->update('suratkeluar', $data);
  }

  public function hapussuratkeluar($id)
  {
    $this->db->delete('suratkeluar', ['id_surat_keluar' => $id]);
  }

  public function ubahnomorsuratkeluar()
  {
    $this->db->query("DELETE FROM no_surat_keluar");
    $this->db->insert('no_surat_keluar', ['nomor_surat_keluar' => $this->input->post('no_surat_keluar') - 1]);
  }
}
