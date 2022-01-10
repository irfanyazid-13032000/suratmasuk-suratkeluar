<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="col-md-10">
  <section class="content">
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-5">

          <div class="form-group">
            <label for="">No Perjanjian</label>
            <input type="text" name="no_perjanjian" class="form-control" id="no_perjanjian" value="<?= $perjanjian['no_perjanjian']; ?>">
          </div>

          <div class="form-group">
            <label for="">Adendum</label>
            <input type="text" name="no_adendum" class="form-control" id="no_adendum" value="<?= $perjanjian['no_adendum']; ?>">
          </div>

          <div class="form-group">
            <label for="">No PK</label>
            <input type="text" name="no_pk" class="form-control" id="no_pk" value="<?= $perjanjian['no_pk']; ?>">
          </div>

          <div class="form-group">
            <label for="">Rekanan</label>
            <input type="text" name="rekanan" class="form-control" id="rekanan" value="<?= $perjanjian['rekanan']; ?>">
          </div>

          <div class="form-group">
            <label for="">Jenis Perjanjian</label>
            <select name="jenis_perjanjian" id="jenis_perjanjian" class="form-control">
              <?php foreach ($jenis_perjanjian as $jenisjanji) : ?>
                <?php if ($perjanjian['jenis_perjanjian'] === $jenisjanji['nama_perjanjian']) : ?>
                  <option value="<?php echo $jenisjanji['nama_perjanjian'] ?>" selected><?php echo $jenisjanji['nama_perjanjian'] ?></option>
                <?php else : ?>
                  <option value="<?php echo $jenisjanji['nama_perjanjian'] ?>"><?php echo $jenisjanji['nama_perjanjian'] ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Jangka Waktu Sewa (Awal)</label>
            <input type="date" name="awal" class="form-control" id="awal" value="<?= $perjanjian['awal']; ?>">
          </div>



          <div class="form-group">
            <label for="">Jangka Waktu Sewa (Akhir)</label>
            <input type="date" name="akhir" class="form-control" id="akhir" value="<?= $perjanjian['akhir']; ?>">
          </div>

        </div>

        <div class="col-md-5">

          <div class="form-group">
            <label for="">Status Perjanjian</label>
            <input type="text" name="status_perjanjian" class="form-control" id="status_perjanjian" value="<?= $perjanjian['status_perjanjian']; ?>">
          </div>

          <div class="form-group">
            <label for="">Objek Perjanjian</label>
            <input type="text" name="objek_perjanjian" class="form-control" id="objek_perjanjian" value="<?= $perjanjian['objek_perjanjian']; ?>">
          </div>

          <div class="form-group">
            <label for="">Jumlah Unit</label>
            <input type="number" name="jumlah_unit" class="form-control" id="jumlah_unit" value="<?= $perjanjian['jumlah_unit']; ?>">
          </div>

          <div class="form-group">
            <label for="">Sewa Per Unit Perbulan</label>
            <input type="number" name="sewa_unit_perbulan" class="form-control" id="sewa_unit_perbulan" value="<?= $perjanjian['sewa_unit_perbulan']; ?>">
          </div>

          <div class="form-group">
            <label for="">Total Sewa Perbulan</label>
            <input type="text" name="total_sewa_perbulan" class="form-control" id="total_sewa_perbulan" readonly value="Rp.<?= number_format($perjanjian['total_sewa_perbulan']); ?>">
          </div>

          <div class="form-group">
            <label for="">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= $perjanjian['lokasi']; ?>">
          </div>

          <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $perjanjian['keterangan']; ?>">
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>

      </div>



    </form>

  </section>
</div>


<script>
  $(document).ready(function() {

    function lala($param) {
      $($param).select2({
        placeholder: 'Pilih Jenis Perjanjian',
        tags: true,
      });

    }

    lala("#jenis_perjanjian");
    lala("#merk");
  });
</script>