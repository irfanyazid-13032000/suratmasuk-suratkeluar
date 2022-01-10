<div class="col-md-10">
  <section class="content">
    <h3>Ubah Rekanan <?= $rekanan['perusahaan']; ?></h3>

    <form action="" method="post">
      <div class="row">
        <div class="col-md-5">

          <input type="hidden" value="<?php echo $rekanan['id'] ?>" name="id">

          <label class="form-label">No Registrasi</label>
          <input type="text" id="perusahaan" class="form-control" value="<?php echo $rekanan['perusahaan'] ?>" name="perusahaan">


          <label class="form-label">nama pemilik</label>
          <input type="text" id="telepon" class="form-control" value="<?php echo $rekanan['telepon'] ?>" name="telepon">



          <div class="modal-footer">

            <button type="submit" class="btn btn-warning"><i class="far fa-edit"></i></button>
          </div>
        </div>
      </div>

    </form>
  </section>
</div>