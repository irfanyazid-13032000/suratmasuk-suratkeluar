<form action="<?php echo base_url() . $this->uri->segment(1) . '/tambah' . $this->uri->segment(1) ?>" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal">
    </div>
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input type="text" class="form-control" id="kode" name="kode" value="<?php echo str_pad($nomor_surat_keluar["MAX(nomor_surat_keluar)"] + 1, 3, "0", STR_PAD_LEFT) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Unit</label>
      <input type="text" name="unit" id="unit" class="form-control" value="<?php echo $this->session->userdata('unit') ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Nomor Surat</label>
      <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
    </div>

    <div class="mb-3">
      <label class="form-label">Perihal</label>
      <input type="text" class="form-control" id="perihal" name="perihal">
    </div>

    <div class="mb-3">
      <label class="form-label">Tujuan</label>
      <input type="text" class="form-control" id="tujuan" name="tujuan">
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan">
    </div>

    <?php
    if (isset($error)) {
      echo "ERROR UPLOAD : <br/>";
      print_r($error);
    }
    ?>

    <div class="mb-3">
      <input type="file" class="custom-file-input" id="inputGroupFile01" name="berkas">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>