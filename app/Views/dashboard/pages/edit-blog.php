<?= $this->extend('dashboard/layout/main-layout'); ?>

<?= $this->section('content'); ?>

<div class="panel-header bg-danger-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Tambah Data</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <a href="/admin/blog" class="btn btn-danger btn-round btn-sm mr-auto"><i class="fas fa-long-arrow-alt-left"></i></a>
                    </div>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/admin/blog/tambah-blog/update/<?= $blog['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="<?= $blog['slug']; ?>">
                            <input type="hidden" name="imgpathLama" value="<?= $blog['imgpath']; ?>">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" aria-describedby="judul" autofocus value="<?= (old('judul')) ? old('judul') : $blog['judul'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?= (old('author')) ? old('author') : $blog['author'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_display" class="form-label">Deskripsi Display</label>
                                <input type="text" class="form-control" id="deskripsi_display" name="deskripsi_display" value="<?= (old('deskripsi_display')) ? old('deskripsi_display') : $blog['deskripsi_display'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="imgpath" class="form-label">Gambar</label>
                                <div class="col-sm-6 my-3">
                                    <img src="/img/<?= $blog['imgpath'] ?>" class="img-thumbnail img-preview">
                                    <label class="my-1" for="lblPrev"><?= $blog['imgpath'] ?></label>
                                </div>
                                <input class="form-control <?= ($validation->hasError('imgpath')) ? 'is-invalid' : ''; ?>" type="file" id="imgpath" name="imgpath" onchange="previewImg()" value="<?= $blog['imgpath'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('imgpath'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea type="text" class="form-control" id="content" name="content"><?= (old('content')) ? old('content') : $blog['content'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
