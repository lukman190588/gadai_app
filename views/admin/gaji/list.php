<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Gaji</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Gaji</a></li>
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
                  <h3 class="mb-0">Daftar Gaji</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-info" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>

              <button class="btn btn-success mb-3" data-toggle="modal" data-target="#TambahGajian"><i class="fas fa-plus"></i></i> Tambah Gajian</button>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama</th>
                      <th scope="col" >Tgl Gajian</th>
                      <th scope="col" >Nominal Gaji Diterima</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($gaji as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_karyawan']?></td>
                        <td><?=$value['waktu_gajian']?></td>
                        <td><?=$value['gaji_diterima']?></td>
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

<form action="<?=base_url('admin/gaji/tambah')?>" method="GET">
<div class="modal fade" id="TambahGajian" tabindex="-1" aria-labelledby="TambahGajianLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahGajianLabel">Tambah Gajian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Pilih Karyawan</label>
          <select class="form-control" name="karyawan" required>
            <option value="">-- PILIH KARYAWAN --</option>
            <?php foreach ($karyawan as $key => $value): ?>
              <option value="<?=$value['id_karyawan']?>"><?=strtoupper($value['nama_karyawan'])?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Pilih</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php get_template_home('admin/footer') ?>