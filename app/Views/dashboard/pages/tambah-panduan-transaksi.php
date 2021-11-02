
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
            <a href="/admin/panduan-transaksi" class="btn btn-danger btn-round btn-sm mr-auto"><i class="fas fa-long-arrow-alt-left"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
            <form action="PanduanTransaksi/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul_trx" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul_trx" name="judul_trx" value="" autofocus>
                </div>
                <div class="mb-3">
                    <label for="format_trx" class="form-label">Format Transaksi</label>
                    <input type="text" class="form-control" id="format_trx" name="format_trx" value="">
                </div>
                <div class="mb-3">
                    <label for="contoh_trx" class="form-label">Contoh Transaksi</label>
                    <input type="text" class="form-control" id="contoh_trx" name="contoh_trx" value="">
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