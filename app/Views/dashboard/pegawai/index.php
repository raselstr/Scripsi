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
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahModal">
          Launch demo modal
        </button>       
        
          <table id="datatablesSimple">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Eselon</th>
                      <th>tanggal Update</th>
                      <th>Actions</th>
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
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


<?= $this->endSection(); ?>