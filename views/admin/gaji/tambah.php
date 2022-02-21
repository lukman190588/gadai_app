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
                  <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                  <h3 class="mb-0">Tambah Gaji</h3>
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
                <div class="col-6">
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Nama Karyawan</strong>
                    </div>
                    <div class="col-6">
                      <?=strtoupper($karyawan['nama_karyawan'])?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Pekerjaan</strong>
                    </div>
                    <div class="col-6">
                      <?=strtoupper($karyawan['nama_pekerjaan'])?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Salary</strong>
                    </div>
                    <div class="col-6">
                      Rp <?=rupiah($karyawan['salary'])?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Total Hari Masuk</strong>
                    </div>
                    <div class="col-6">
                      <?=$totalmasuk?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Total Izin Cuti</strong>
                    </div>
                    <div class="col-6">
                      <?=$totalizincuti?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Total Izin Dispensasi</strong>
                    </div>
                    <div class="col-6">
                      <?=$totalizindispensasi?>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <strong>Total Alfa</strong>
                    </div>
                    <div class="col-6">
                      <?=$totalalfa?>
                    </div>
                  </div>
                  <hr>
                  <?php echo form_open_multipart(base_url('admin/gaji/store')); ?>
                    <input type="hidden" name="id_karyawan" value="<?=$karyawan['id_karyawan']?>" required>
                    <div class="row mb-2">
                      <div class="col-6">
                        <strong>Nama Gajian</strong>
                      </div>
                      <div class="col-6">
                        <input type="text" name="nama_gajian" class="form-control" required placeholder="Contoh: Gajian Bulan Mei 2021">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-6">
                        <strong>Nominal Gaji Diterima</strong>
                      </div>
                      <div class="col-6">
                        <input type="text" name="nominal_gaji_diterima" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-6">
                        <strong>Waktu Gajian Karyawan</strong>
                      </div>
                      <div class="col-6">
                        <input type="date" name="waktu_gajian_karyawan" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-6">
                        <strong>Tgl. Gaji Diterima</strong>
                      </div>
                      <div class="col-6">
                        <input type="date" name="tgl_gaji_diterima" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-6">
                        <strong>Catatan (Opsional)</strong>
                      </div>
                      <div class="col-6">
                        <input type="text" name="catatan_gaji" class="form-control" required placeholder="">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                  </form>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <h4>Daftar Absen</h4>
                      <div class="table-responsive">
                        <table class="table align-items-center" id="table_data">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col" >No</th>
                              <th scope="col" >Tgl Absen</th>
                              <th scope="col" >Status Absen</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($list_absen as $key => $value): ?>
                              <tr>
                                <td><?=$key+1?></td>
                                <td><?=$value['waktu_absen']?></td>
                                <td><?=strtoupper($value['status_absen'])?></td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                      
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

<?php get_template_home('admin/footer') ?>