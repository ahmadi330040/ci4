<?= $this->extend('layout/template') ?>
 
<?php $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Daftar Komik</h1>
            <a href="/komik/create" class="btn btn-primary mb-3">Tambah Data Komik</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                <?php foreach ($komik as $k) : ?>
                    <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><img src="<?= $k['imgpath']; ?>" alt="" class="sampul"></td>
                    <td><?= $k['judul']; ?></td>
                    <td><a href="komik/<?= $k['slug'] ?>" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>