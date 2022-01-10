<form action="" method="POST" enctype="multipart/form-data">
  <input value="<?php echo $suratmasuk['id_surat_masuk'] ?>" name="id_surat_masuk" type="hidden">


  <div class="container">
    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $suratmasuk['tanggal'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $suratmasuk['kode'] ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Unit</label>
      <?php if ($this->session->userdata('unit') === 'SDM & Umum') : ?>
        <select name="unit" id="unit" class="form-control">
          <?php foreach ($unit as $un) : ?>
            <?php if ($un === $suratmasuk['unit']) : ?>
              <option value="<?php echo $suratmasuk['unit'] ?>" selected><?php echo $suratmasuk['unit'] ?></option>
            <?php else : ?>
              <option value="<?php echo $un ?>"><?php echo $un ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      <?php else : ?>
        <input type="text" value="<?php echo $suratmasuk['unit'] ?>" readonly class="form-control" name="unit" id="unit">
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label class="form-label">Nomor Surat</label>
      <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?php echo $suratmasuk['nomor_surat'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Perihal</label>
      <input type="text" class="form-control" id="perihal" name="perihal" value="<?php echo $suratmasuk['perihal'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Tujuan</label>
      <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $suratmasuk['tujuan'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $suratmasuk['keterangan'] ?>">
    </div>

    <div class="mb-3">
      <input type="file" class="custom-file-input" name="berkas">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>