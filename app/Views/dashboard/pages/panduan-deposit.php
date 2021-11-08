<?= $this->extend('dashboard/layout/main-layout'); ?>

<?= $this->section('content'); ?>

<div class="panel-header bg-danger-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Panduan Deposit</h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <a href="/admin/tambah-panduan-deposit" class="btn btn-danger btn-round"><i class="fa fa-plus"></i> Tambah Data</a>
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
            <h4 class="card-title">Daftar Panduan</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <?php if(session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
            <?php endif; ?>
            <table id="add-row" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th style="width: 5%">No</th>
                  <th>Bank</th>
                  <th>Nama Rekening</th>
                  <th style="width: 18%">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1 ?> <?php foreach ($deposit as $d) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $d['nama_bank']; ?></td>
                  <td><?= $d['nama_rekening']; ?></td>
                  <td>
                    <a href="/admin/panduan-deposit/detail/<?= $d['id']; ?>" class="btn btn-success badge rounded-pill btn-xs"><i class="fas fa-edit"></i> edit</a>
                    <form action="/admin/panduan-deposit/delete/<?= $d['id']; ?>" method="POST" class="d-inline" onclick="return confirm('yakin akan dihapus?')">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger badge rounded-pill btn-xs"><i class="fas fa-trash-alt"></i> hapus</button>
                    </form>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
<?= $this->endSection('content'); ?>