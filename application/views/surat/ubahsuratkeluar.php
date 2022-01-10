<form action="" method="POST" enctype="multipart/form-data">
  <input value="<?php echo $suratkeluar['id_surat_keluar'] ?>" name="id_surat_keluar" type="hidden">


  <div class="container">
    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $suratkeluar['tanggal'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $suratkeluar['kode'] ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Unit</label>
      <select name="unit" id="unit" class="form-control">
        <?php foreach ($unit as $un) : ?>
          <?php if ($un === $suratkeluar['unit']) : ?>
            <option value="<?php echo $suratkeluar['unit'] ?>" selected><?php echo $suratkeluar['unit'] ?></option>
          <?php else : ?>
            <option value="<?php echo $un ?>"><?php echo $un ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Nomor Surat</label>
      <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?php echo $suratkeluar['nomor_surat'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Perihal</label>
      <input type="text" class="form-control" id="perihal" name="perihal" value="<?php echo $suratkeluar['perihal'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Tujuan</label>
      <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $suratkeluar['tujuan'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $suratkeluar['keterangan'] ?>">
    </div>

    <div class="mb-3">
      <input type="file" class="custom-file-input" name="berkas">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>