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
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
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
            <?php echo form_open_multipart(base_url('admin/karyawan/update')); ?>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Detail User </h3>
                </div>
              </div>
            </div>
            <div class="card-body">

              <?php if ($this->sess['level_user'] == 'super_admin' || $this->sess['level_user'] == 'admin'): ?>
                <input type="hidden" name="id_karyawan" value="<?=$karyawan['id_karyawan']?>" required>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nama</label>
                      <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama" value="<?=$karyawan['nama_karyawan']?>" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">NIK</label>
                      <input type="text" name="nik_karyawan" class="form-control" placeholder="NIK" value="<?=$karyawan['nik_karyawan']?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace();" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">No. HP</label>
                      <input type="text" name="no_telp_karyawan" class="form-control" placeholder="No. HP" value="<?=$karyawan['no_telp_karyawan']?>" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username" >Pekerjaan</label>
                      <select class="form-control" name="id_pekerjaan">
                        <?php foreach ($pekerjaan as $key => $value): ?>
                          <option value="<?=$value['id_pekerjaan']?>" <?=selected_helper($value['id_pekerjaan'], $karyawan['id_pekerjaan'])?>><?=$value['nama_pekerjaan']?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Unit Kerja</label>
                      <input type="text" name="unit_kerja" value="<?=$karyawan['unit_kerja']?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Alamat Unit</label>
                      <input type="text" name="alamat_unit" value="<?=$karyawan['alamat_unit']?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Jabatan</label>
                      <input type="text" name="jabatan" value="<?=$karyawan['jabatan']?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Atasan Langsung</label>
                      <input type="text" name="atasan_langsung" value="<?=$karyawan['atasan_langsung']?>" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Tanggal Bergabung</label>
                      <input type="date" name="tgl_bergabung" value="<?=$karyawan['tgl_bergabung']?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Email</label>
                      <input type="text" name="email_karyawan" class="form-control" placeholder="Email" value="<?=$karyawan['email_karyawan']?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Alamat</label>
                      <textarea name="alamat_karyawan" class="form-control"><?=$karyawan['alamat_karyawan']?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Salary</label>
                      <input type="text" name="salary" class="form-control" placeholder="Rp." value="<?=$karyawan['salary']?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace();">
                    </div>
                  </div>
                </div>
              <?php endif ?>
                
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Edit User</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
<?php get_template_home('admin/footer') ?>