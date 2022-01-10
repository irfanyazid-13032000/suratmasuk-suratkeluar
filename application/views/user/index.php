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


  </div>
  <?php echo $this->pagination->create_links(); ?>


  <div class="tablefixhead" style="overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Password</th>
          <th>Unit</th>
          <th>Action</th>

        </tr>
      </thead>
      <?php if ($pencarian === 0) : ?>
        <td colspan="10" style="color: red;">Data Tidak Ada!!</td>
      <?php endif; ?>
      <?php foreach ($datauser as $daus) : ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $daus['nama'] ?></td>
          <td><?php echo $daus['password'] ?></td>
          <td><?php echo $daus['unit'] ?></td>
          <td>
            <a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>/ubah<?php echo $this->uri->segment(1) ?>/<?php echo $daus['id_user'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
            <a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>/hapus<?php echo $this->uri->segment(1) ?>/<?php echo $daus['id_user'] ?>" class="btn btn-danger" onclick="return confirm(`apakah anda yakin menghapus data <?php echo $daus['nama'] ?>?`)"><i class="fas fa-trash"></i></a>
          </td>

        </tr>
      <?php endforeach; ?>


    </table>

    <a href="<?php echo base_url() . $this->uri->segment(1) ?>/tambah<?php echo $this->uri->segment(1) ?>" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a>
    <!-- <a href="<?php echo base_url() ?>exportexcel" type="button" class="btn btn-success"><i class="far fa-file-excel"></i></a> -->
</section>