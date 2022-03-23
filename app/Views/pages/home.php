<?= $this->extend('layout/template'); ?>
<!--Memanggil folder layout dengan file template sama dengan extend class -->

<?= $this->section('content'); ?>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <h1>Hello, world!</h1>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>