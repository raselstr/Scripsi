<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
  
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= base_url('/'); ?>" >Dashboard / </a></span> <?= esc($title); ?></h4>
  <div class="col-lg-12 mb-4 order-0">  
   <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header"><?= esc($title); ?></h5>
      <div class="table-responsive text-nowrap">
        <table class="table card-table data">
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
              <td><?= $peg->tanggal_update; ?></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bx-trash me-1"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>
              <?php endforeach; ?>   
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

<hr class="my-5" />

              


<?= $this->endSection(); ?>

            