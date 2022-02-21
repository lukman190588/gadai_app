<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Karyawan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
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
                  <h3 class="mb-0">Daftar Karyawan</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-info" role="alert">
                  <?=$this->session->flashdata('message')?>
                </div>
              <?php endif ?>
              <a href="<?=base_url('admin/karyawan/add')?>" class="btn btn-primary mb-3 col-md-3" style="width: auto;"><i class="fas fa-plus"></i> Add Karyawan</a>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama</th>
                      <th scope="col" >NIK</th>
                      <th scope="col" >Pekerjaan</th>
                      <th scope="col" >Email</th>
                      <th scope="col">No. HP</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($karyawan as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_karyawan']?></td>
                        <td><?=$value['nik_karyawan']?></td>
                        <td><?=$value['nama_pekerjaan']?></td>
                        <td><?=$value['email_karyawan']?></td>
                        <td><?=$value['no_telp_karyawan']?></td>
                        <td>
                          <?php if ($value['status_karyawan'] == 'aktif'): ?>
                            <span class="badge badge-primary">Aktif</span>
                          <?php endif ?>
                          <?php if ($value['status_karyawan'] == 'non_aktif'): ?>
                            <span class="badge badge-danger">Non Aktif</span>
                          <?php endif ?>
                        </td>
                        <td><a href="<?=base_url('admin/karyawan/detail/').$value['id_karyawan']?>" class="btn btn-primary btn-sm"><i class="fas fa-info"></i> Detail</a></td>
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