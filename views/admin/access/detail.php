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
                <?php if ($this->session->flashdata('message')): ?>
                  <div class="alert alert-info" role="alert">
                    <?=$this->session->flashdata('message')?>
                  </div>
                <?php endif ?>
                <div class="row">
                  <div class="col-md-6 text-center">
                    <img src="<?=$this->sess['foto_user']?>" class="img-fluid w-50" style="border-radius: ;"><br>
                    <button class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#fotoEdit"><i class="fas fa-image"></i> Edit Foto</button>
                  </div>
                  <div class="col-md-6">
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Nama</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['nama_user']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Level</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['level_user']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>Email</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['email_user']?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-6">
                        <strong>No HP</strong>
                      </div>
                      <div class="col-6">
                        <?=$detail['no_hp_user']?>
                      </div>
                    </div>
                    <?php if ($this->sess['id_user'] == $detail['id_user']): ?>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editPass"><i class="fas fa-key"></i></i> Edit Password</button>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

<?php echo form_open_multipart(base_url('admin/access/update_pic')); ?>
<div class="modal fade" id="fotoEdit" tabindex="-1" aria-labelledby="fotoEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fotoEditLabel">Edit Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_user" value="<?=$detail['id_user']?>">
        <div class="form-group">
          <label for="">Foto</label>
          <input type="file" name="foto_user" id="file" onchange="fileValidation(this.id);" required>
          <div id="previewpic" class="mt-2"><img src="" alt class="img-fluid" style="width: 250px;"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php echo form_open(base_url('admin/access/edit_pass')); ?>
<div class="modal fade" id="editPass" tabindex="-1" aria-labelledby="editPassLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPassLabel">Edit Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_user" value="<?=$detail['id_user']?>">
        <div class="form-group">
          <label for="">Password Sekarang</label>
          <input type="password" class="form-control" name="password_lama" required>
        </div>
        <div class="form-group">
          <label for="">Password Baru</label>
          <input type="password" class="form-control" name="password_baru" required>
        </div>
        <div class="form-group">
          <label for="">Konfirmasi Password</label>
          <input type="password" class="form-control" name="password_conf" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php get_template_home('admin/footer') ?>