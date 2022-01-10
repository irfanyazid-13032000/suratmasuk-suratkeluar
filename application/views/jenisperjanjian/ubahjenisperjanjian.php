<div class="col-md-10">
  <section class="content">
    <h3>Ubah Jenis Perjanjian <?= $jenis_perjanjian['nama_perjanjian']; ?></h3>

    <form action="" method="post">
      <div class="row">
        <div class="col-md-5">

          <input type="hidden" value="<?php echo $jenis_perjanjian['id'] ?>" name="id">

          <label class="form-label">Nama Perjanjian</label>
          <input type="text" id="nama_perjanjian" class="form-control" value="<?php echo $jenis_perjanjian['nama_perjanjian'] ?>" name="nama_perjanjian">


          <div class="modal-footer">

            <button type="submit" class="btn btn-warning"><i class="far fa-edit"></i></button>
          </div>
        </div>
      </div>

    </form>
  </section>
</div>