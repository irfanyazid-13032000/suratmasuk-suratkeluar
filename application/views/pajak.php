<style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }

  .tablefixhead {
    overflow: auto;
    height: 600px;
  }

  .tablefixhead thead tr {
    position: sticky;
    top: 0;
    z-index: 1;
    background-color: #ddd;
  }

  th,
  td {
    text-align: center;
    padding: 8px;
  }

  tr:nth-child(even) {
    border: 2px solid #ddd;
  }
</style>
<div class="col-md-10">
  <section class="content">
    <div class="row mt-3">
      <div class="col-md-6">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Data Pajak" name="keyword">
            <button class="btn btn-outline-secondary" type="submit">cari</button>
            <a href="<?php echo base_url() ?>close/pajak" class="btn btn-dark">Tampil Seluruh Data</a>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h5>Hasil Pencarian : <?php echo $pencarian ?></h5>
      </div>
      <?php if ($keyword !== NULL) : ?>
        <div class="col-md-4">
          <h4>Kata Kunci : <?= $keyword; ?></h4>
        </div>
      <?php endif; ?>
    </div>
    <?php echo $this->pagination->create_links(); ?>


    <div class="tablefixhead" style="overflow-x:auto;">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nopol</th>
            <th>Tahun</th>
            <th>Merk</th>
            <th>Masa STNK</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php foreach ($pajak as $pajek) : ?>
          <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $pajek['nopol'] ?></td>
            <td><?php echo $pajek['tahun'] ?></td>
            <td><?php echo $pajek['merk'] ?></td>
            <?php if ($pajek['stnk'] <= date('Y-m-d')) : ?>
              <?php $jatuhtempo = (strtotime(date('Y-m-d')) - strtotime($pajek['stnk'])) / (60 * 60 * 24); ?>
              <td><?php echo $pajek['stnk'] ?> <br> <span class="badge bg-danger">Telah Jatuh tempo <br> <?php echo $jatuhtempo ?> <br> Hari yang lalu</span></td>
            <?php else : ?>
              <?php $sisahari = (strtotime($pajek['stnk']) - strtotime(date('Y-m-d'))) / (60 * 60 * 24); ?>
              <?php if ($sisahari <= 7 && $sisahari > 1) : ?>
                <td><?php echo $pajek['stnk'] ?><br><span class="badge bg-danger"><?php echo $sisahari; ?> Hari Lagi</span></td>
              <?php elseif ($sisahari <= 30) : ?>
                <td><?php echo $pajek['stnk'] ?> <br> <span class="badge bg-warning"><?php echo $sisahari ?> Hari Lagi</span></td>
              <?php else : ?>
                <td><?php echo $pajek['stnk'] ?> <br> <span class="badge bg-success"><?php echo $sisahari ?> Hari Lagi</span></td>
              <?php endif; ?>
            <?php endif; ?>
            <td>
              <a href="<?php echo base_url() ?>pajak/ubahpajak/<?php echo $pajek['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
              <a href="<?php echo base_url() ?>pajak/hapuspajak/<?php echo $pajek['id'] ?>" class="btn btn-danger" onclick="return confirm(`Apakah Anda Yakin ingin menghapus data <?php echo $pajek['nopol'] ?> ?`)"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
        <?php endforeach; ?>
      </table>

      <a href="<?php echo base_url() ?>pajak/tambahmobil" type="button" class="btn btn-info"><i class="fas fa-plus-circle"></i></a>
      <a href="<?php echo base_url() ?>exportpajak" type="button" class="btn btn-success"><i class="far fa-file-excel"></i></a>
  </section>
</div>