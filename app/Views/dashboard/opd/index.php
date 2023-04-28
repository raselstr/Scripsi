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
          <div class="row">
            <div class="col-xl-6 col-mb-12">
              <a class="btn btn-primary" href="<?= 'opd-form'; ?>"><i class="fa-solid fa-circle-plus"></i><?= " Tambah ".esc($title); ?></a>
              <a class="btn btn-primary" href="<?= 'opd-export'; ?>"><i class="fa-solid fa-file-excel"></i> Export Excel</a>
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-file-arrow-up"></i> Import Data
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="<?= base_url('DataOpd.xlsx'); ?>"><i class="fa-solid fa-file-excel"></i> Tempate Excel</a></li>
                  <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-file-excel"></i> Upload File</a></li>
                </ul>
            </div>
          </div>

          <div class="card-body"></div>

          <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
              <?= session('success'); ?>
            </div>
          <?php endif; ?>
          <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
              <?= session('error'); ?>
            </div>
          <?php endif; ?>
          <table id="datatablesSimple">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NAMA OPD</th>
                      <th>KODE OPD</th>
                      <th>TANGGAL UPDATE</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($getData as $dinas) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dinas->nama_opd; ?></td>
                    <td><?= $dinas->kode_opd; ?></td>
                    <td><?= date('d/m/Y H:i:s',strtotime($dinas->tanggal_update)); ?></td>
                    <td>
                      <a href="<?= site_url('opd-form/'.$dinas->id_opd); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                      <form action="<?= site_url('opd-hapus/' .$dinas->id_opd); ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class = "btn btn-danger btn-sm" onclick="return confirm('Apakah data ingin dihapus');"><i class="fas fa-trash-alt"></i>Hapus</button>
                      </form>
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
          <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= site_url('opd-import'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <?= csrf_field() ?>
            <input type="file" name="file_excel" id="file_excel" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?= $this->endSection(); ?>
