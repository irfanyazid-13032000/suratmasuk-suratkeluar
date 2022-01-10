<div class="col-md-10">
  <section class="content">
    <form action=" <?php echo base_url() . $this->uri->segment(1) . '/tambahmobil' ?>" method="POST">
      <div class="row">
        <div class="col-md-4">

          <div class="form-group">
            <label for="">Nopol</label>
            <input type="text" name="nopol" class="form-control" id="nopol">
          </div>

          <div class="form-group">
            <label for="">Perakitan</label>
            <input type="text" name="tahun" class="form-control" id="tahun">
          </div>

          <div class="form-group">
            <label for="">Merk / Type</label>
            <input type="text" name="merk" class="form-control" id="merk">
          </div>

          <div class="form-group">
            <label for="">No Rangka</label>
            <input type="text" name="rangka" class="form-control" id="rangka">
          </div>

          <div class="form-group">
            <label for="">Mesin</label>
            <input type="text" name="mesin" class="form-control" id="mesin">
          </div>

          <div class="form-group">
            <label for="">Bahan Bakar</label>
            <input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar">
          </div>


        </div>

        <div class="col-md-4">

          <div class="form-group">
            <label for="">Instansi</label>
            <input type="text" name="instansi" class="form-control" id="instansi">
          </div>

          <div class="form-group">
            <label for="">Masa Asuransi</label>
            <input type="date" name="asuransi" class="form-control" id="asuransi">
          </div>

          <div class="form-group">
            <label for="">Masa STNK</label>
            <input type="date" name="stnk" class="form-control" id="stnk">
          </div>

          <div class="form-group">
            <label for="">Polis</label>
            <input type="text" name="polis" class="form-control" id="polis">
          </div>

          <div class="form-group">
            <label for="">Pertanggungan</label>
            <input type="number" name="pertanggungan" class="form-control" id="pertanggungan" value="">
          </div>

          <div class="form-group">
            <label for="">Premi</label>
            <input type="number" name="premi" class="form-control" id="premi" value="">
          </div>

        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="">pilih status</option>
              <option value="umum">umum</option>
              <option value="disewakan">disewakan</option>
            </select>
          </div>


          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i></button>
          </div>

        </div>



      </div>

</div>



</form>

</section>
</div>