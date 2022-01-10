<div class="col-md-10">
  <section class="content">
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-4">

          <div class="form-group">
            <label for="">Nopol</label>
            <input type="text" name="nopol" class="form-control" id="nopol" value="<?= $asuransi['nopol']; ?>">
          </div>

          <div class="form-group">
            <label for="">Perakitan</label>
            <input type="text" name="tahun" class="form-control" id="tahun" value="<?= $asuransi['tahun']; ?>">
          </div>

          <div class="form-group">
            <label for="">merk</label>
            <input type="text" name="merk" class="form-control" id="merk" value="<?= $asuransi['merk']; ?>">
          </div>

          <div class="form-group">
            <label for="">Rangka</label>
            <input type="text" name="rangka" class="form-control" id="rangka" value="<?= $asuransi['rangka']; ?>">
          </div>


          <div class="form-group">
            <label for="">Mesin</label>
            <input type="text" name="mesin" class="form-control" id="mesin" value="<?= $asuransi['mesin']; ?>">
          </div>



          <div class="form-group">
            <label for="">Bahan Bakar</label>
            <input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar" value="<?= $asuransi['bahan_bakar']; ?>">
          </div>

        </div>

        <div class="col-md-4">

          <div class="form-group">
            <label for="">Instansi</label>
            <input type="text" name="instansi" class="form-control" id="instansi" value="<?= $asuransi['instansi']; ?>">
          </div>

          <div class="form-group">
            <label for="">asuransi</label>
            <input type="date" name="asuransi" class="form-control" id="asuransi" value="<?= $asuransi['asuransi']; ?>">
          </div>

          <div class="form-group">
            <label for="">Jatuh Tempo STNK</label>
            <input type="date" name="stnk" class="form-control" id="stnk" value="<?= $asuransi['stnk']; ?>">
          </div>

          <div class="form-group">
            <label for="">Polis</label>
            <input type="number" name="polis" class="form-control" id="polis" value="<?= $asuransi['polis']; ?>">
          </div>

          <div class="form-group">
            <label for="">Pertanggungan</label>
            <input type="text" name="pertanggungan" class="form-control" id="pertanggungan" value="<?= $asuransi['pertanggungan']; ?>">
          </div>

          <div class="form-group">
            <label for="">Premi</label>
            <input type="text" name="premi" class="form-control" id="premi" value="<?= $asuransi['premi']; ?>">
          </div>

        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="status" class="form-control">
              <?php if ($asuransi['status'] === 'umum') : ?>
                <option value="umum" selected>umum</option>
                <option value="disewakan">disewakan</option>
              <?php else : ?>
                <option value="disewakan" selected>disewakan</option>
                <option value="umum">umum</option>
              <?php endif; ?>
            </select>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i></button>
          </div>

        </div>

      </div>



    </form>

  </section>
</div>