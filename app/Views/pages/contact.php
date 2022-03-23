<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); /*tempat menjelaskan ini adalah isi atau konten halaman??menurut saya */ ?>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <h1>About Me</h1>

            <?php foreach ($at as $a) : ?>
                <ul>
                    <li><?php print_r($a['tipe']); ?></li>
                    <li><?php print_r($a['alamat']); ?></li>
                    <li><?php print_r($a['kota']); ?></li>
                </ul>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>