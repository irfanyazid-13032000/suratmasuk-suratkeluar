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
                <input type="text" class="form-control" placeholder="Cari Perjanjian" name="keyword">
                <button class="btn btn-outline-secondary" type="submit">cari</button>
                <a href="<?php echo base_url() ?>close/perjanjian" class="btn btn-dark">tampil data seluruh</a>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <h5>Hasil Pencarian : <?php echo $pencarian ?></h5>
          </div>
          <div class="col-md-5">
            <h5>Jumlah No Perjanjian : <?= $jumlah_no_perjanjian; ?></h5>
          </div>
        </div>
        <?php echo $this->pagination->create_links(); ?>


        <div class="tablefixhead" style="overflow-x:auto;">
          <table>
            <thead>
              <tr class="red">
                <th>No</th>
                <th>No Perjanjian</th>
                <th>Adendum</th>
                <th>No PK</th>
                <th>Rekanan</th>
                <th>Jenis Perjanjian</th>
                <th>Jangka&nbspwaktu&nbspSewa (Awal)</th>
                <th>Jangka&nbspWaktu&nbspSewa (Akhir)</th>
                <th>Status Perjanjian</th>
                <th>Objek Perjanjian</th>
                <th>Jumlah Unit</th>
                <th>Sewa Unit Perbulan</th>
                <th>Total Sewa Perbulan</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Action</th>
                <th>Nama File</th>
                <th>Aktif</th>
              </tr>
            </thead>
            <?php foreach ($perjanjian as $janji) : ?>
              <tr>
                <?php if ($janji['keaktifan'] === 'aktif') : ?>
                  <td><?= ++$start; ?></td>
                <?php else : ?>
                  <td style="background-color: yellow;"><?= ++$start; ?></td>
                <?php endif; ?>
                <td><?= $janji['no_perjanjian']; ?></td>
                <?php if ($janji['keaktifan'] === 'aktif') : ?>
                  <td><?= $janji['no_adendum']; ?></td>
                  <td><?= $janji['no_pk']; ?></td>
                  <td><?= $janji['rekanan']; ?></td>
                  <td><?= $janji['jenis_perjanjian']; ?></td>
                  <td><?= $janji['awal']; ?></td>
                  <?php if ($janji['akhir'] <= date('Y-m-d')) : ?>
                    <td style="color: red;"><?= date('d-M-Y', strtotime($janji['akhir'])); ?> <br> <span class="badge bg-danger">Telah Jatuh Tempo</span></td>
                  <?php else : ?>
                    <?php $sisahari = (strtotime($janji['akhir']) - strtotime(date('Y-m-d'))) / (60 * 60 * 24) ?>
                    <?php if ($sisahari <= 30) : ?>
                      <td><?= date('d-M-Y', strtotime($janji['akhir'])); ?> <br> <span class="badge bg-warning"><?php echo $sisahari ?> Hari Lagi</span></td>
                    <?php else : ?>
                      <td style="color: blue;"><?= date('d-M-Y', strtotime($janji['akhir'])); ?> <br> <span class="badge bg-primary"><?php echo $sisahari ?> Hari Lagi</span></td>
                    <?php endif; ?>
                  <?php endif; ?>
                  <td><?= $janji['status_perjanjian']; ?></td>
                  <td><?= $janji['objek_perjanjian']; ?></td>
                  <td><?= $janji['jumlah_unit']; ?></td>
                  <?php if ($janji['sewa_unit_perbulan'] !== "") : ?>
                    <td>Rp.<?= number_format($janji['sewa_unit_perbulan']); ?></td>
                  <?php else : ?>
                    <td>Data Tidak Boleh Kosong</td>
                  <?php endif; ?>
                  <td>Rp.<?= number_format($janji['total_sewa_perbulan']); ?></td>
                  <td><?= $janji['lokasi']; ?></td>
                  <td><?= $janji['keterangan']; ?></td>
                  <td>
                    <a href="<?php echo base_url() ?>perjanjian/ubahperjanjian/<?php echo $janji['id_perjanjian'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="<?php echo base_url() ?>perjanjian/hapusperjanjian/<?php echo $janji['id_perjanjian'] ?>" class="btn btn-danger" onclick="return confirm(`Apakah Anda Yakin ingin menghapus data <?php echo $janji['no_perjanjian'] ?> ?`)"><i class="fas fa-trash"></i></a>
                    <a href="<?php echo base_url() ?>perjanjian/download/<?php echo $janji['id_perjanjian'] ?>" class="btn btn-secondary"><i class="fas fa-download"></i></a>
                  </td>
                  <td><?php echo $janji['nama_berkas'] ?></td>
                <?php elseif ($janji['keaktifan'] === 'nonaktif') : ?>
                  <td style="background-color: yellow;"><?= $janji['no_adendum']; ?></td>
                  <td style="background-color: yellow;"><?= $janji['no_pk']; ?></td>
                  <td style="background-color: yellow;"><?= $janji['rekanan']; ?></td>
                  <td style="background-color:yellow"><?= $janji['jenis_perjanjian']; ?></td>
                  <td style="background-color: yellow;"><?= $janji['awal']; ?></td>
                  <?php if ($janji['akhir'] <= date('Y-m-d')) : ?>
                    <td style="color: red;background-color:yellow"><?= date('d-M-Y', strtotime($janji['akhir'])); ?> <br> <span class="badge bg-danger">Telah Jatuh Tempo</span></td>
                  <?php else : ?>
                    <?php $sisahari = (strtotime($janji['akhir']) - strtotime(date('Y-m-d'))) / (60 * 60 * 24) ?>
                    <?php if ($sisahari <= 30) : ?>
                      <td style="background-color: yellow;"><?= date('d-M-Y', strtotime($janji['akhir'])); ?> <br> <span class="badge bg-warning"><?php echo $sisahari ?> Hari Lagi</span></td>
                    <?php else : ?>
                      <td style="color: blue; background-color:yellow"><?= date('d-M-Y', strtotime($janji['akhir'])); ?> <br> <span class="badge bg-primary"><?php echo $sisahari ?> Hari Lagi</span></td>
                    <?php endif; ?>
                  <?php endif; ?>
                  <td style="background-color: yellow;"><?= $janji['status_perjanjian']; ?></td>
                  <td style="background-color: yellow;"><?= $janji['objek_perjanjian']; ?></td>
                  <td style="background-color: yellow;"><?= $janji['jumlah_unit']; ?></td>
                  <?php if ($janji['sewa_unit_perbulan'] !== "") : ?>
                    <td style="background-color: yellow;">Rp.<?= number_format($janji['sewa_unit_perbulan']); ?></td>
                  <?php else : ?>
                    <td style="background-color:yellow">Data Tidak Boleh Kosong</td>
                  <?php endif; ?>
                  <td style="background-color:yellow">Rp.<?= number_format($janji['total_sewa_perbulan']); ?></td>
                  <td style="background-color:yellow;"><?= $janji['lokasi']; ?></td>
                  <td style="background-color:yellow"><?= $janji['keterangan']; ?></td>
                  <td style="background-color: yellow;">
                    <a href="<?php echo base_url() ?>perjanjian/ubahperjanjian/<?php echo $janji['id_perjanjian'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="<?php echo base_url() ?>perjanjian/hapusperjanjian/<?php echo $janji['id_perjanjian'] ?>" class="btn btn-danger" onclick="return confirm(`Apakah Anda Yakin ingin menghapus data <?php echo $janji['no_perjanjian'] ?> ?`)"><i class="fas fa-trash"></i></a>
                    <a href="<?php echo base_url() ?>perjanjian/download/<?php echo $janji['id_perjanjian'] ?>" class="btn btn-secondary"><i class="fas fa-download"></i></a>
                  </td>
                  <td style="background-color: yellow;"><?php echo $janji['nama_berkas'] ?></td>
                <?php endif; ?>

                <td>
                  <div class="form-check">
                    <input class="cekkeaktifan" type="checkbox" <?= checkdulu($janji['keaktifan']) ?> data-keaktifan="<?php echo $janji['keaktifan'] ?>" data-id_perjanjian="<?php echo $janji['id_perjanjian'] ?>">

                </td>
              </tr>
        </div>
      <?php endforeach; ?>
      </table>

      <a href="<?php echo base_url() ?>perjanjian/tambahperjanjian" type="button" class="btn btn-info"><i class="fas fa-plus-circle"></i></a>
      <a href="<?php echo base_url() ?>exportexcel" type="button" class="btn btn-success"><i class="far fa-file-excel"></i></a>
      </section>
    </div>



    <script type="text/javascript">
      const table = document.querySelector('table');

      let headerCell = null;
      let hidercell = null;


      x = 1;
      y = 1;



      for (let row of table.rows) {
        const secondcell = row.cells[1];
        const firstCell = row.cells[0];




        if (headerCell === null || secondcell.innerText !== headerCell.innerText) {


          headerCell = secondcell;

          if (firstCell.hasAttribute('id')) {
            // tidak ngapa ngapain
          } else {
            // let nomornya = document.createTextNode(x++);
            // y++;
            hidercell = firstCell;
            // firstCell.appendChild(nomornya);
            // console.log(y);
          }


        } else {

          // hidercell.rowSpan++;
          // firstCell.remove();


          headerCell.rowSpan++;
          secondcell.remove();


        }

      }

      // console.log(x);
    </script>