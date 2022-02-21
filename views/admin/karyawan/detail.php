<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                    <h3 class="mb-0">Detail Profil </h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <?php if ($this->session->flashdata('success')): ?>
                  <div class="alert alert-info" role="alert">
                    <?=$this->session->flashdata('success')?>
                  </div>
                <?php endif ?>
                <div class="row justify-content-md-center">
                  <div class="col-md-6">
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Nama Karyawan</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['nama_karyawan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>NIK</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['nik_karyawan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>No Telp</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['no_telp_karyawan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Email</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['email_karyawan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Pekerjaan</strong>
                      </div>
                      <div class="col-6">
                        <?=$pekerjaan['nama_pekerjaan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Alamat</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['alamat_karyawan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Unit Kerja</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['unit_kerja']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Alamat Unit</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['alamat_unit']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Jabatan</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['jabatan']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Atasan Langung</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['atasan_langsung']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Tgl Bergabung</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['tgl_bergabung']?>
                      </div>
                    </div>
                    <a href="<?=base_url('admin/karyawan/edit/').$detail['id_karyawan']?>" class="btn btn-success btn-sm">Edit Data Karyawan</a>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
      </div>

<?php get_template_home('admin/footer') ?>