<form action="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>/ubah<?php echo $this->uri->segment(1) ?>" method="POST">
  <input value="<?php echo $profil['id_user'] ?>" name="id_user" type="hidden">


  <div class="container">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $profil['nama'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password" value="<?php echo $profil['password'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Unit</label>
      <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $profil['unit'] ?>" readonly>
    </div>




    <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
</form>