<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/gayaku.css">
  <title>yok bisa</title>
</head>
<nav>
  <a href="#" class="nav">dashboard</a>
  <a href="#" class="nav">surat-masuk</a>
  <a href="#" class="nav">surat-keluar</a>
  <a href="#" class="nav">logout</a>
  <div class="animation start-home"></div>
</nav>
<h1><?php echo base_url() ?></h1>






<script>
  const ada = document.querySelectorAll('.nav');
  for (let i = 0; i < ada.length; i++) {
    ada[i].addEventListener('click', function() {
      ada[i].className = 'nav activebro';
      console.log(ada[i]);
      let animasi = document.querySelector('.animation');
      animasi.className = `animation start-${this.innerText.toLowerCase()}`;
    });

  }
</script>

</html>