<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="col-md-10">
  <section class="content">
    <form action=" <?php echo base_url() . 'perjanjian/tambahperjanjian' ?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4">

          <div class="form-group">
            <label for="">No Perjanjian</label>
            <input type="text" name="no_perjanjian" class="form-control" id="no_perjanjian">
          </div>

          <div class="form-group">
            <label for="">Adendum</label>
            <input type="text" name="no_adendum" class="form-control" id="no_adendum">
          </div>

          <div class="form-group">
            <label for="">No PK</label>
            <input type="text" name="no_pk" class="form-control" id="no_pk">
          </div>

          <div class="form-group">
            <label for="">Rekanan</label>
            <select name="rekanan" id="rekanan" class="form-control">
              <option value="">Pilih Rekanan</option>
              <?php foreach ($rekanan as $rekan) : ?>
                <option value="<?= $rekan['perusahaan']; ?>"><?= $rekan['perusahaan']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>

          <div class="form-group">
            <label for="">Jenis Perjanjian</label>
            <select name="jenis_perjanjian" id="jenis_perjanjian" class="form-control">
              <option value="">Pilih Jenis Perjanjian</option>
              <?php foreach ($jenis_perjanjian as $jenisjanji) : ?>
                <option value="<?= $jenisjanji['nama_perjanjian']; ?>"><?= $jenisjanji['nama_perjanjian']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>

          <div class="form-group">
            <label for="">Jangka Waktu Sewa (Awal)</label>
            <input type="date" name="awal" class="form-control" id="awal">
          </div>



          <div class="form-group">
            <label for="">Jangka Waktu Sewa (Akhir)</label>
            <input type="date" name="akhir" class="form-control" id="akhir">
          </div>

        </div>

        <div class="col-md-4">

          <div class="form-group">
            <label for="">Status Perjanjian</label>
            <input type="text" name="status_perjanjian" class="form-control" id="status_perjanjian">
          </div>

          <div class="form-group">
            <label for="">Objek Perjanjian</label>
            <input type="text" name="objek_perjanjian" class="form-control" id="objek_perjanjian">
          </div>

          <div class="form-group">
            <label for="">Jumlah Unit</label>
            <input type="number" name="jumlah_unit" class="form-control" id="jumlah_unit" value="">
          </div>

          <div class="form-group">
            <label for="">Sewa Per Unit Perbulan</label>
            <input type="number" name="sewa_unit_perbulan" class="form-control" id="sewa_unit_perbulan" value="">
          </div>

          <div class="form-group">
            <label for="">Total Sewa Perbulan</label>
            <input type="text" name="total_sewa_perbulan" class="form-control" id="total_sewa_perbulan" readonly>
          </div>

          <div class="form-group">
            <label for="">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi">
          </div>

          <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan">
          </div>


        </div>

        <div class="col-md-4">
          <?php
          if (isset($error)) {
            echo "ERROR UPLOAD : <br/>";
            print_r($error);
          }
          ?>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="berkas">
              <label class="custom-file-label" for="inputGroupFile01">Upload File</label>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
          </div>
        </div>

      </div>



    </form>

  </section>
</div>


<script>
  $(document).ready(function() {

    function lala($param, $namafield) {
      $($param).select2({
        placeholder: `Pilih ${$namafield}`,
        tags: true,
      });

    }

    lala("#rekanan", "Rekanan");
    lala("#jenis_perjanjian", "Jenis Perjanjian");
  });



  const unit = document.querySelector('#sewa_unit_perbulan');

  unit.addEventListener('change', function() {
    const total_sewa_perbulan = document.querySelector('#total_sewa_perbulan');
    const jumlah_unit = document.querySelector('#jumlah_unit');

    total_sewa_perbulan.value = `${jumlah_unit.value} X ${unit.value}`;

    console.log(jumlah_unit.value);



  });
</script>