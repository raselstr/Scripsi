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
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          <?= esc($title); ?>
        </div>
        <div class="card-body">
          <div class="card col-4 mb-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah OPD
            </button>
          </div>
          <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
              <?= session('success'); ?>
            </div>
          <?php endif; ?>
          <table id="datatablesSimple">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NAMA OPD</th>
                      <th>TANGGAL UPDATE</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($opd as $dinas) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dinas->nama_opd; ?></td>
                    <td><?= date('d/m/Y H:i:s',strtotime($dinas->tanggal_update)); ?></td>
                    <td>
                      <a href="" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                      <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>   
              </tbody>
          </table>
              </div>
          </div>
      </div>
  </main>


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah OPD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- menampilkan data yang sedang diinput agar tidak hilang (seperti Old) -->
          <?php if (session()->getFlashdata('hasForm')) 
          {
            extract(session()->getFlashData('hasForm'));
          }
          ?>
      <div class="modal-body">

        <?php if(session()->getFlashData('validation')) { ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach(session()->getFlashdata('validation')as $item) : ?>
                  <li><?= $item  ?></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php } ?>

        <?= form_open('opd-create') ?>
        <div class="mb-3">
            <label for="nama_opd" class="form-label">Nama OPD</label>
            <input type="text" class="form-control" name="nama_opd" id="nama_opd" placeholder="Masukkan Nama OPD">
                  <?php if(isset(session()->getFlashData('validation')['nama_opd'])) { ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashData('validation')['nama_opd'] ?>
                    </div>
                  <?php } ?>
        
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
  <?= $this->endSection(); ?>
