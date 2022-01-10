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
      <div class="col-md-10">
        <form action="" method="POST">
          <div class="input-group mb-4">
            <input type="text" class="form-control" placeholder="Cari Data Asuransi" name="keyword">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
            <a href="<?php echo base_url() ?>close/asuransi" class="btn btn-dark">Display All Data</a>
            <a href="<?php echo base_url() ?>close/filter" class="btn btn-warning">Hapus Filter</a>
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
            <th data-nyath="nopol">Nopol</th>
            <th data-nyath="tahun">Perakitan</th>
            <th data-nyath="merk">Merk</th>
            <th data-nyath="rangka">Rangka</th>
            <th data-nyath="mesin">Mesin</th>
            <th data-nyath="bahan_bakar">Bahan Bakar</th>
            <th data-nyath="instansi">Instansi</th>
            <th data-nyath="asuransi">Asuransi</th>
            <th data-nyath="polis">Polis</th>
            <th data-nyath="pertanggungan">Pertanggungan</th>
            <th data-nyath="premi">Premi&nbsp;Asuransi</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php foreach ($asuransi as $asu) : ?>
          <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $asu['nopol'] ?></td>
            <td><?php echo $asu['tahun'] ?></td>
            <td><?php echo $asu['merk'] ?></td>
            <td><?php echo $asu['rangka'] ?></td>
            <td><?php echo $asu['mesin'] ?></td>
            <td><?php echo $asu['bahan_bakar'] ?></td>
            <td><?php echo $asu['instansi'] ?></td>
            <?php if ($asu['asuransi'] <= date('Y-m-d')) : ?>
              <?php $jatuhtempo = (strtotime(date('Y-m-d')) - strtotime($asu['asuransi'])) / (60 * 60 * 24); ?>
              <td><?php echo date('d M Y', strtotime($asu['asuransi'])) ?> <br> <span class="badge bg-danger">Telah Jatuh tempo <br> <?php echo $jatuhtempo ?> <br> Hari yang lalu</span></td>
            <?php else : ?>
              <?php $sisahari = (strtotime($asu['asuransi']) - strtotime(date('Y-m-d'))) / (60 * 60 * 24); ?>
              <?php if ($sisahari <= 7 && $sisahari > 1) : ?>
                <td><?php echo date('d M Y', strtotime($asu['asuransi'])) ?><br><span class="badge bg-danger"><?php echo $sisahari; ?> Hari Lagi</span></td>
              <?php elseif ($sisahari <= 30) : ?>
                <td><?php echo date('d M Y', strtotime($asu['asuransi'])) ?> <br> <span class="badge bg-warning"><?php echo $sisahari ?> Hari Lagi</span></td>
              <?php else : ?>
                <td><?php echo date('d M Y', strtotime($asu['asuransi'])) ?> <br> <span class="badge bg-success"><?php echo $sisahari ?> Hari Lagi</span></td>
              <?php endif; ?>
            <?php endif; ?>
            <td><?php echo $asu['polis'] ?></td>
            <td>Rp. <?php echo number_format($asu['pertanggungan']); ?></td>
            <td>Rp. <?php echo number_format($asu['premi']) ?></td>
            <td>
              <a href="<?php echo base_url() ?>asuransi/ubahasuransi/<?php echo $asu['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
              <a href="<?php echo base_url() ?>asuransi/hapusasuransi/<?php echo $asu['id'] ?>" class="btn btn-danger" onclick="return confirm(`Apakah Anda Yakin ingin menghapus data <?php echo $asu['nopol'] ?> ?`)"><i class="fas fa-trash"></i></a>
            </td>

          </tr>
        <?php endforeach; ?>
      </table>

      <a href="<?php echo base_url() ?>asuransi/tambahmobil" type="button" class="btn btn-info"><i class="fas fa-plus-circle"></i></a>
      <a href="<?php echo base_url() ?>exportexcel" type="button" class="btn btn-success"><i class="far fa-file-excel"></i></a>
  </section>
</div>