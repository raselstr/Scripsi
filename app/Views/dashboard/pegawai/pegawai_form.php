<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php
    if($getData!= null)
    {
      extract($getData);
    }
?>

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
              
               
           
              <?= form_open('pegawai-form'); ?>
                <?= csrf_field() ?>
                  <div class="mb-3 row">
                    <input type="hidden" name="id_pegawai" value="<?= $getData!=null ? $id_pegawai : old('id_pegawai') ?>">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                      <input type="text" name="nip" value="<?= $getData!=null ? $nip : old('nip') ?>" class="form-control <?= (isset(validation_errors()['nip'])) ? 'is-invalid' : null; ?>" maxlength="18">
                          <div class="invalid-feedback">
                            <?= validation_show_error('nip') ?>
                          </div>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset(validation_errors()['nama']) ? 'is-invalid' : null; ?>" name="nama" value="<?= $getData!=null ? $nama : old('nama') ?>">
                          <div class="invalid-feedback">
                            <?= validation_show_error('nama'); ?>
                          </div>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="eselon" class="col-sm-2 col-form-label">Eselon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset(validation_errors()['eselon']) ? 'is-invalid' : null; ?>" name="eselon" value="<?= $getData!=null ? $eselon : old('eselon') ?>">
                          <div class="invalid-feedback">
                            <?= validation_show_error('eselon'); ?>
                          </div>
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