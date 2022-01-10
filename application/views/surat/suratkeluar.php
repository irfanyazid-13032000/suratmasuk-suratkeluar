<style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }

  .tablefixhead {
    overflow: auto;
    height: 1100px;
  }

  .tablefixhead thead tr {
    position: sticky;
    top: 0;
    z-index: 1;
    background-color: #ddd;
  }

  th,
  td {
    text-align: center;
    padding: 8px;
  }

  tr:nth-child(even) {
    border: 2px solid #ddd;
  }
</style>

<section class="content">
  <div class="row mt-3">
    <div class="col-md-10">
      <form action="" method="POST">
        <div class="input-group mb-4">
          <input type="text" class="form-control" placeholder="Cari Surat Keluar" name="keyword">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
          <a href="<?php echo base_url() ?>close/tampilkandata/<?php echo $this->uri->segment(1) ?>" class="btn btn-dark">Display All Data</a>
          <a href="<?php echo base_url() ?>close/filter/<?php echo $this->uri->segment(1) ?>" class="btn btn-warning">Delete Filter</a>
          <input type="checkbox" class="btn-check" id="btn-check-outlined" name="desc" data-lulu="DESC">
          <label class="btn btn-outline-primary" for="btn-check-outlined">Z-A</label>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <?php if ($keyword !== NULL) : ?>
        <h5>Hasil Pencarian : <?php echo $pencarian ?></h5>
      <?php else : ?>
        <h5>Seluruh Data : <?php echo $pencarian ?></h5>
      <?php endif; ?>
    </div>
    <div class="col-md-3">
      <?php if ($this->session->userdata('filter')) : ?>
        <h5>Urutkan Berdasarkan : <?php echo $this->session->userdata('filter') ?></h5>
      <?php else : ?>
        <h5>Urutkan Berdasarkan : Tanggal</h5>
      <?php endif ?>
    </div>
    <div class="col-md-3">
      <?php if ($keyword !== NULL) : ?>
        <h4>Kata Kunci : <?= $keyword; ?></h4>
      <?php endif; ?>
    </div>
    <?php if ($this->session->userdata('descku')) : ?>
      <div class="col-md-3">
        <h4><?php echo $this->session->userdata('descku') ?></h4>
      </div>
    <?php endif; ?>
  </div>
  <?php echo $this->pagination->create_links(); ?>


  <div class="tablefixhead" style="overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th data-nyath="tanggal">Tanggal</th>
          <th data-nyath="kode">Kode</th>
          <th data-nyath="unit">Unit</th>
          <th data-nyath="nomor_surat">No Surat</th>
          <th data-nyath="perihal">Perihal</th>
          <th data-nyath="tujuan">Tujuan</th>
          <th data-nyath="keterangan">Keterangan</th>
          <th>File</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php if ($pencarian === 0) : ?>
        <td colspan="10" style="color: red;">Data Tidak Ada!!</td>
      <?php endif; ?>
      <?php foreach ($suratkeluar as $suke) : ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo date('d M Y', strtotime($suke['tanggal'])) ?></td>
          <td><?php echo $suke['kode'] ?></td>
          <td><?php echo $suke['unit'] ?></td>
          <td><?php echo $suke['nomor_surat'] ?></td>
          <td><?php echo $suke['perihal'] ?></td>
          <td><?php echo $suke['tujuan'] ?></td>
          <td><?php echo $suke['keterangan'] ?></td>
          <td><a href="<?php echo base_url() ?>suratkeluar/download/<?php echo $suke['id_surat_keluar'] ?>"><?php echo $suke['nama_berkas'] ?></a></td>
          <td>
            <?php if ($this->session->userdata('unit') === 'SDM & Umum' || $this->session->userdata('unit') === $suke['unit']) : ?>
              <a href="<?php echo base_url() ?>suratkeluar/ubahsuratkeluar/<?php echo $suke['id_surat_keluar'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
              <a href="<?php echo base_url() ?>suratkeluar/hapussuratkeluar/<?php echo $suke['id_surat_keluar'] ?>" class="btn btn-danger" onclick="return confirm(`Apakah Anda Yakin ingin menghapus data mengenai <?php echo $suke['perihal'] ?> ?`)"><i class="fas fa-trash"></i></a>
            <?php else : ?>
              <h5>forbidden</h5>
            <?php endif; ?>
          </td>

        </tr>
      <?php endforeach; ?>


    </table>

    <a href="<?php echo base_url() ?>suratkeluar/tambahsuratkeluar" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a>
    <!-- <a href="<?php echo base_url() ?>exportexcel" type="button" class="btn btn-success"><i class="far fa-file-excel"></i></a> -->
</section>