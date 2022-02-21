<?php get_template_home('admin/header') ?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Setting</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Setting</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hari Masuk</li>
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
                  <h3 class="mb-0">Setting Hari Masuk</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-info" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>


            <?php echo form_open_multipart(base_url('admin/setting/update_hari_masuk')); ?>
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Hari Masuk </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <?php foreach ($hari_masuk as $key => $value): ?>
                  <div class="form-check">
                    <input class="form-check-input" name="hari<?=$value['no_hari']?>" type="checkbox" value="1" id="check<?=$key?>" <?=checked_helper($value['status_masuk'], 1)?>>
                    <label class="form-check-label" for="check<?=$key?>">
                      <?=strtoupper($value['nama_hari'])?>
                    </label>
                  </div>
                <?php endforeach ?>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Edit Hari Masuk</button>
            </div>
            <?php echo form_close(); ?>
            </div>
            
          </div>
        </div>
      </div>

<?php get_template_home('admin/footer') ?>