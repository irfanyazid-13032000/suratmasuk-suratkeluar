<br>
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <form action="<?php echo base_url() ?>nomorsurat/ubahnomorsuratmasuk" method="POST">
        <div class="form-group">
          <label for="exampleInputPassword1">Nomor Surat Masuk Saat Ini</label>
          <input type="number" class="form-control" name="no_surat_masuk_sekarang" value="<?php echo  str_pad($no_surat_masuk["MAX(nomor_surat_masuk)"] + 1, 3, "0", STR_PAD_LEFT) ?>" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nomor Surat Masuk</label>
          <input type="number" class="form-control" id="no_surat_masuk" name="no_surat_masuk" placeholder="masukkan nomor surat masuk">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <div class="col-md-5">
      <form action="<?php echo base_url() ?>nomorsurat/ubahnomorsuratkeluar" method="POST">
        <div class="form-group">
          <label for="exampleInputPassword1">Nomor Surat Keluar Saat Ini</label>
          <input type="number" class="form-control" name="no_surat_keluar_sekarang" value="<?php echo  str_pad($no_surat_keluar["MAX(nomor_surat_keluar)"] + 1, 3, "0", STR_PAD_LEFT) ?>" readonly>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nomor Surat Keluar</label>
          <input type="number" class="form-control" id="no_surat_keluar" name="no_surat_keluar" placeholder="masukkan nomor surat keluar">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>
</div>