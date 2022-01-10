<h4 style="margin-top: 50px;"></h4>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="></script> -->
<script src="<?php echo base_url('yangjelasjquery.js') ?>"></script>

<script>
    let teha = document.querySelectorAll('th');
    for (let i = 0; i < teha.length; i++) {
        teha[i].addEventListener('click', function() {
            const klik = $(this).data('nyath');
            $.ajax({
                url: "<?php echo base_url() ?>" + "<?php echo $this->uri->segment(1) ?>" + "/index",
                type: 'post',
                data: {
                    klik: klik
                },
                success: function() {
                    document.location.href = '<?php echo base_url() ?>' + "<?php echo $this->uri->segment(1) ?>" + "/index"
                }

            })
        })
    }

    const daribawah = document.querySelector('input[name=desc]');
    daribawah.addEventListener('change', function() {
        const urutan = $(this).data('lulu');
        $.ajax({
            url: "<?php echo base_url() ?>" + "<?php echo $this->uri->segment(1) ?>" + "/index",
            type: 'post',
            data: {
                urutan: urutan
            },
            success: function() {
                document.location.href = '<?php echo base_url() ?>' + "<?php echo $this->uri->segment(1) ?>" + "/index"
            }

        })
    })
</script>


</body>

</html>