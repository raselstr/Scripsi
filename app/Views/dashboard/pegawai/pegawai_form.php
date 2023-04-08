<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
  
<!-- Content -->
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pegawai Form</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Pegawai Form</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
              <?php if($validation->getErrors()){
                echo '<fieldset style = "border:red dashed 1px; padding:15px">';
                echo '<div style="color:red">' .$validation->listErrors().'</div>';
                echo '<fieldset>';
              }
              ?>
           
              <form action="<?= base_url('pegawai/tambah'); ?>" method="post">
                <?= csrf_field() ?>
                
                  <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                      <input type="text" name="nip" value="<?= old('nip'); ?>" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : null; ?>" >
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : null; ?>" name="nama">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="eselon" class="col-sm-2 col-form-label">Eselon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('eselon')) ? 'is-invalid' : null; ?>" name="eselon">
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