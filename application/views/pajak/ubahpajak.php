<div class="col-md-10">
  <section class="content">
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-4">

          <div class="form-group">
            <label for="">Nopol</label>
            <input type="text" name="nopol" class="form-control" id="nopol" value="<?= $pajak['nopol']; ?>">
          </div>

          <div class="form-group">
            <label for="">Perakitan</label>
            <input type="text" name="tahun" class="form-control" id="tahun" value="<?= $pajak['tahun']; ?>">
          </div>


          <div class="form-group">
            <label for="">Jatuh Tempo STNK</label>
            <input type="date" name="stnk" class="form-control" id="stnk" value="<?= $pajak['stnk']; ?>">
          </div>

          <div class="form-group">
            <label for="">Polis</label>
            <input type="text" name="polis" class="form-control" id="polis" value="<?= $pajak['polis']; ?>">
          </div>



          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i></button>
          </div>



        </div>
      </div>





    </form>

  </section>
</div>