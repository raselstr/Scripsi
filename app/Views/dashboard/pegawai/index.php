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
          <div class="card col-2 mb-4">
            <a class="btn btn-primary" href="<?= 'pegawai-form'; ?>"><?= esc($title); ?></a>
          </div>
         <?php if (session('success')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?= session('success'); ?>
                  </div>
              <?php endif; ?>
          <table id="datatablesSimple">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Eselon</th>
                      <th>tanggal Update</th>
                      <th>Foto</th>
                      <th width="10%">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($pegawai as $peg) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $peg->nip; ?></td>
                    <td><?= $peg->nama; ?></td>
                    <td><?= $peg->eselon; ?></td>
                    <td><?= date('d/m/Y H:i:s',strtotime($peg->tanggal_update)); ?></td>
                    <td>
                      <img src="/upload/<?= $peg->foto; ?>" alt="" width="100px">
                      <?= $peg->foto; ?>
                    </td>

                    <td>
                      <a href="<?= site_url('pegawai-form/'.$peg->id_pegawai); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                      <form action="<?= site_url('pegawai-hapus/' .$peg->id_pegawai); ?>" method="post" class="d-inline">
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
  <?= $this->endSection(); ?>
