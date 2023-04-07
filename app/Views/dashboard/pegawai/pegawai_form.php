<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
  
<!-- Content -->
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= esc($title); ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= esc($title); ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
              <?php $validation = \Config\Services::validation(); ?>
              
              <form action="<?= base_url('pegawai/tambah'); ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">  
                  <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nip">
                    </div>
                    
                          <?php if (! empty($errors)): ?>
                              <div class="alert alert-danger">
                              <?php foreach ($errors as $field => $error): ?>
                                  <p><?= esc($error) ?></p>
                              <?php endforeach ?>
                              </div>
                          <?php endif ?>
                    </div>
                </div>
                  <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="eselon" class="col-sm-2 col-form-label">Eselon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="eselon">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </main>
  
<?= $this->endSection(); ?>