<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>

</style>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-4 mb-3 ">Daftar Orang</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)); //mengurutkan angka tabel sesuai dengan apa yg kita inginkan nilai 6 didaptkan dari jumlah dari controler orang
                    //maksudnya jika di di halaman awal yaitu 1 lalu page pertama adalah 1-1=0 *6 =0 +1=1 jadi halaman awal angkanya dimulai dari satu
                    //untuk 2 -1=1*6=6+1=7 maka nilai no selanjutnya ditabel adalh 7
                    ?>
                    <?php foreach ($orang as $o) : ?>
                        <!-- $orang diambil dari variable array $data dengan key orang di controler orang method index -->
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o['alamat']; ?></td>
                            <td><a href="/orang/<?= $o['id']; //arahan filenya jika diklik pai dulu ka routesnya lalu dieksekusi sesuai permintaan routesnya
                                                ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('orang', 'orang_pagination'); //nama tabel yg di pagination dan nama file yg akan digunakan pagination 
            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>