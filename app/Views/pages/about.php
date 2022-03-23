<?= $this->extend('layout/template'); ?>
<!--memanggil file -->


<?= $this->section('content'); ?>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <?php d($tes); //ini sama dengan vardump untuk menampilkan data array  dan bisa gunakan dd($tes) untuk tidak menampilkan script dibawah hanya fokus kepada var_dumpny saja
            ?>
            <h1>About Me</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae et est excepturi doloremque consequuntur atque
                impedit beatae porro eos eius, corrupti, earum eum praesentium! Ea numquam harum quae praesentium magni?</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>