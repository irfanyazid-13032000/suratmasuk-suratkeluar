<form action="" method="POST">

  <div class="container">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password">
    </div>

    <div class="mb-3">
      <label class="form-label">Unit</label>
      <select name="unit" id="unit" class="form-control">
        <?php foreach ($unit as $un) : ?>
          <option value="<?php echo $un ?>"><?php echo $un ?></option>
        <?php endforeach; ?>
      </select>
    </div>



    <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
</form>