<form action="" method="POST">
  <input value="<?php echo $user['id_user'] ?>" name="id_user" type="hidden">


  <div class="container">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password" value="<?php echo $user['password'] ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Unit</label>
      <select name="unit" id="unit" class="form-control">
        <?php foreach ($unit as $un) : ?>
          <?php if ($un === $user['unit']) : ?>
            <option value="<?php echo $user['unit'] ?>" selected><?php echo $user['unit'] ?></option>
          <?php else : ?>
            <option value="<?php echo $un ?>"><?php echo $un ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>



    <button type="submit" class="btn btn-primary">Ubah</button>
  </div>
</form>