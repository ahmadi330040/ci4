<?= $this->extend('dashboard/layout/main-layout'); ?>

<?= $this->section('content'); ?>

<div class="panel-header bg-danger-gradient">
  <div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
      <div>
        <h2 class="text-white pb-2 fw-bold">Blogs</h2>
      </div>
      <div class="ml-md-auto py-2 py-md-0">
        <a href="/register-users" class="btn btn-danger btn-round"><i class="fa fa-plus"></i> Tambah Blog</a>
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
            <h4 class="card-title">Daftar Blog</h4>
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
                  <th>Judul</th>
                  <th>Author</th>
                  <th style="width: 18%">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1 ?> <?php foreach ($blog as $b) : ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $b['judul']; ?></td>
                  <td><?= $b['author']; ?></td>
                  <td>
                    <a href="edit-users/<%= userModel._id %>" class="btn btn-success badge rounded-pill btn-xs"><i class="fas fa-edit"></i> edit</a>
                    <form action="/daftar-users?_method=DELETE" method="POST" class="d-inline" onclick="return confirm('yakin akan dihapus?')">
                      <input type="hidden" name="_id" value="<%= userModel._id %>" />
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