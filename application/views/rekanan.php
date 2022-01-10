<div class="col-md-10">
  <section class="content">
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Nama rekanan" name="keyword">
            <button class="btn btn-outline-secondary" type="submit">cari</button>
            <a href="<?php echo base_url() ?>close/rekanan" class="btn btn-dark">Tampil Seluruh Data</a>
          </div>
        </form>
      </div>
    </div>
    <h4>Hasil Pencarian : <?php echo $pencarian ?></h4>
    <?php echo $this->pagination->create_links(); ?>
    <div class="container">
      <table class="table">
        <tr>
          <th>no</th>
          <th>Rekanan</th>
          <th>No Telepon</th>

          <th>Action</th>
        </tr>
        <?php if ($rekanan !== []) : ?>
          <?php foreach ($rekanan as $rekan) : ?>
            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $rekan['perusahaan'] ?></td>
              <td><?php echo $rekan['telepon'] ?></td>
              <td>
                <a href="<?php echo base_url() ?>rekanan/ubahrekanan/<?php echo $rekan['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a href="<?php echo base_url() ?>rekanan/hapusrekanan/<?php echo $rekan['id'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash"></i></a>
              </td>
            <?php endforeach; ?>
          <?php else : ?>
            <td colspan="3" style="text-align: center; color:red;">DATA TIDAK ADA</td>
          <?php endif; ?>
      </table>
    </div>

    <!-- pemicu modal box -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fas fa-plus"></i>
    </button>
  </section>
</div>


<!-- modal box nya -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Silahkan Input data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">

            <form action=" <?php echo base_url() . 'rekanan/tambahrekanan' ?>" method="POST">

              <div class="form-group">
                <label for="">Nama Perusahaan</label>
                <input type="text" name="perusahaan" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="">No Telepon</label>
                <input type="text" name="telepon" class="form-control" required>
              </div>



              <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
              </div>


            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>