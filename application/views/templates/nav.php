<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link <?php if ($this->uri->segment(1) === 'halo') {
                          echo 'active';
                        } ?>" aria-current="page" href="<?php echo base_url() ?>halo">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($this->uri->segment(1) === 'suratmasuk') {
                          echo 'active';
                        } ?>" href="<?php echo base_url() ?>suratmasuk">Surat-Masuk</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($this->uri->segment(1) === 'suratkeluar') {
                          echo 'active';
                        } ?>" href="<?php echo base_url() ?>suratkeluar">Surat-Keluar</a>
  </li>

  <?php if ($this->session->userdata('nama') === 'endang') : ?>

    <li class="nav-item">
      <a class="nav-link <?php if ($this->uri->segment(1) === 'nomorsurat') {
                            echo 'active';
                          } ?>" href="<?php echo base_url() ?>nomorsurat">Nomor-Surat</a>
    </li>

  <?php endif; ?>


  <?php if ($this->session->userdata('nama') === 'endang') : ?>

    <li class="nav-item">
      <a class="nav-link <?php if ($this->uri->segment(1) === 'user') {
                            echo 'active';
                          } ?>" href="<?php echo base_url() ?>user">Pegawai</a>
    </li>

  <?php endif; ?>


  <li class="nav-item">
    <a class="nav-link <?php if ($this->uri->segment(1) === 'datadiri') {
                          echo 'active';
                        } ?>" href="<?php echo base_url() ?>datadiri">Data-Diri</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() ?>close/logout">logout</a>
  </li>
</ul>