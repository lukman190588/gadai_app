<?php get_template_home('admin/header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pekerjaan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pekerjaan</a></li>
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
                  <h3 class="mb-0">Daftar Pekerjaan</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-info" role="alert">
                  <?=$this->session->flashdata('success')?>
                </div>
              <?php endif ?>
              <button class="btn btn-success mb-3" data-toggle="modal" data-target="#TambahPekerjaan"><i class="fas fa-plus"></i></i> Tambah Pekerjaan</button>

              <div class="table-responsive">
                <table class="table align-items-center" id="table_data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Nama</th>
                      <th scope="col" >Total Pekerja</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pekerjaan as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value['nama_pekerjaan']?></td>
                        <td>0</td>
                        <td>
                          <button class="btn btn-success btn-sm" id="<?=$value['id_pekerjaan']?>" data-toggle="modal" data-target="#EditPekerjaan" onclick="editPekerjaan(this.id, '<?=$value["nama_pekerjaan"]?>')"><i class="fas fa-edit"></i></i> Edit Pekerjaan</button>
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

<?php echo form_open(base_url('admin/pekerjaan/store')); ?>
<div class="modal fade" id="TambahPekerjaan" tabindex="-1" aria-labelledby="TambahPekerjaanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahPekerjaanLabel">Tambah Pekerjaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Nama Pekerjaan</label>
          <input type="text" class="form-control" name="nama_pekerjaan" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php echo form_open(base_url('admin/pekerjaan/update')); ?>
<div class="modal fade" id="EditPekerjaan" tabindex="-1" aria-labelledby="EditPekerjaanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditPekerjaanLabel">Edit Pekerjaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_pekerjaan_edit" name="id_pekerjaan" required>
        <div class="form-group">
          <label for="">Nama Pekerjaan</label>
          <input type="text" class="form-control" id="nama_pekerjaan_edit" name="nama_pekerjaan" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
  function editPekerjaan(id, nama)
  {
    document.getElementById('id_pekerjaan_edit').value = id;
    document.getElementById('nama_pekerjaan_edit').value = nama;
  }
</script>
<?php get_template_home('admin/footer') ?>