
<?= $this->extend('dashboard/layout/main-layout'); ?>

<?= $this->section('content'); ?>
<div class="panel-header bg-danger-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Edit Data</h2>
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
            <a href="/admin/panduan-deposit" class="btn btn-danger btn-round btn-sm mr-auto"><i class="fas fa-long-arrow-alt-left"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
            <form action="/admin/panduan-deposit/update/<?= $panduandeposit['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="img_bankLama" value="<?= $panduandeposit['img_bank']; ?>">
                <input type="hidden" name="id" value="<?= $panduandeposit['id']; ?>">
                <div class="mb-3">
                    <label for="img_bank" class="form-label">Pilih Gambar</label>
                    <div class="col-sm-2 my-3">
                        <img src="../../../img/<?= $panduandeposit['img_bank'] ?>" class="img-thumbnail img-preview">
                        <label class="my-1" for="lblPrev"><?= $panduandeposit['img_bank'] ?></label>
                    </div>
                    <label for="img_bank" class="form-label my-1">*Ukuran : 95x30</label>
                    <input class="form-control <?= ($validation->hasError('img_bank')) ? 'is-invalid' : ''; ?>" type="file" id="img_bank" name="img_bank" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('img_bank'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama_bank" class="form-label">Nama Bank</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?= (old('nama_bank')) ? old('nama_bank') : $panduandeposit['nama_bank'] ?>" autofocus>
                </div>
                <div class="mb-3">
                    <label for="nama_rekening" class="form-label">Nama Rekening</label>
                    <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?= (old('nama_rekening')) ? old('nama_rekening') : $panduandeposit['nama_rekening'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                    <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening" value="<?= (old('nomor_rekening')) ? old('nomor_rekening') : $panduandeposit['nomor_rekening'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection('content'); ?>