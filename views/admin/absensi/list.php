<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Absensi</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Absensi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Daftar Absensi</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-info" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama</th>
                      <th scope="col" >Waktu Absensi</th>
                      <th scope="col" >Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($absensi as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_karyawan']?></td>
                        <td><?=$value['waktu_absen']?></td>
                        <td><?=strtoupper($value['status_absen'])?></td>
                        <td>
                          <a href="<?=base_url('admin/karyawan/detail/').$value['id_karyawan']?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></i> Detail Karyawan</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>

<?php get_template_home('admin/footer') ?>