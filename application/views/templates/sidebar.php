<style>
  .nav-item {
    background-color: #2C394B;
  }

  #sidebar:hover {
    background-color: #082032;
  }

  .nav-item.telahditekan {
    background-color: #082032;
  }
</style>

<div class="row">

  <!-- ini sidebar -->
  <div class="col-md-2 mt-2 pr-10 pt-3" id="sdbr">
    <ul class="nav flex-column mb-5">

      <li class="nav-item <?php if ($this->uri->segment(1) === 'halo') {
                            echo "telahditekan";
                          } ?>" id='sidebar'>
        <a class="nav-link text-white" href="<?php echo base_url() ?>halo">Dashboard</a>
        <hr class="bg-secondary">
      </li>
      <li class="nav-item <?php if ($this->uri->segment(1) === 'asuransi') {
                            echo "telahditekan";
                          } ?>" id="sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>asuransi">Asuransi</a>
        <hr class="bg-secondary">
      </li>

      <li class="nav-item <?php if ($this->uri->segment(1) === 'pajak') {
                            echo "telahditekan";
                          } ?>" id='sidebar'>
        <a class=" nav-link text-white" aria-current="page" href=" <?php echo base_url() ?>pajak">Pajak</a>
        <hr class="bg-secondary">
      </li>

      <li class="nav-item" id="sidebar">
        <a class="nav-link text-white" href="<?php echo base_url() ?>close/logout" onclick="return confirm('Apakah Anda Yakin ingin Logout?')">logout</a>
        <hr class="bg-secondary">
      </li>


    </ul>
  </div>
  <!-- ini tutup sidebar -->