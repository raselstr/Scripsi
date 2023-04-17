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
            <li class="breadcrumb-item active"><a href="opd"><?= esc($title); ?></a></li>
            <li class="breadcrumb-item active"><?= esc($page); ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
 
              <?= form_open('opd-save'); ?>
                <?= csrf_field() ?>
                  <div class="mb-3 row">
                    <label for="nama_opd" class="col-sm-2 col-form-label">Nama OPD</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_opd" value="<?= $getData!=null ? $nama_opd : old('nama_opd') ?>" class="form-control <?= (isset(validation_errors()['nama_opd'])) ? 'is-invalid' : null; ?>" >
                          <div class="invalid-feedback">
                            <?= validation_show_error('nama_opd') ?>
                          </div>
                    </div>
                  </div>
                  <div class = "">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
  </main>
  
<?= $this->endSection(); ?>