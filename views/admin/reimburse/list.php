<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Reimburse</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Reimburse</a></li>
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
                  <h3 class="mb-0">Daftar Reimburse</h3>
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
                      <th scope="col" >Jenis Klaim</th>
                      <th scope="col" >Tgl Pengajuan</th>
                      <th scope="col" >Nominal Reimburse</th>
                      <th scope="col" >Tgl. Reimburse</th>
                      <th scope="col" >File</th>
                      <th scope="col" >Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reimburse as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_karyawan']?></td>
                        <td><?=$value['jenis_klaim']?></td>
                        <td><?=$value['tgl_pengajuan']?></td>
                        <td><?=$value['nominal_reimburse']?></td>
                        <td><?=$value['tgl_reimburse']?></td>
                        <td></td>
                        <td><?=strtoupper($value['status_reimburse'])?></td>
                        <td>
                          <a href="<?=base_url('admin/karyawan/detail/').$value['id_karyawan']?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></i> Detail Karyawan</a>

                          <?php if ($value['status_reimburse'] == 'pengajuan'): ?>
                            <a href="<?=base_url('admin/reimburse/terima/').$value['id_reimburse']?>" class="btn btn-success btn-sm" onclick="return confirm('Terima Reimburse?')"><i class="fas fa-check"></i></i> Terima Reimburse</a>

                            <a href="<?=base_url('admin/reimburse/tolak/').$value['id_reimburse']?>" class="btn btn-danger btn-sm" onclick="return confirm('Tolak Reimburse?')"><i class="fas fa-times"></i></i> Tolak Reimburse</a>
                          <?php endif ?>

                          
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