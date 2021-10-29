<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Komik</h2>
            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" aria-describedby="judul" autofocus value="<?= (old('judul')) ? old('judul') : $komik['judul'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?= (old('author')) ? old('author') : $komik['author'] ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi_display" class="form-label">Deskripsi Display</label>
                    <input type="text" class="form-control" id="deskripsi_display" name="deskripsi_display" value="<?= (old('deskripsi_display')) ? old('deskripsi_display') : $komik['deskripsi_display'] ?>">
                </div>
                <div class="mb-3">
                    <label for="imgpath" class="form-label">Gambar</label>
                    <div class="col-sm-2 my-3">
                        <img src="/img/<?= $komik['imgpath'] ?>" class="img-thumbnail img-preview">
                    </div>
                    <input class="form-control <?= ($validation->hasError('imgpath')) ? 'is-invalid' : ''; ?>" type="file" id="imgpath" name="imgpath" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('imgpath'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" class="form-control" id="content" name="content"><?= (old('content')) ? old('content') : $komik['content'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>