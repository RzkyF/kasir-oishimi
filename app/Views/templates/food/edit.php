<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>

<!--**********************************
          Content body start
      ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- Add Project -->
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="text-black font-w500">Project Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Deadline</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Client Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Form Edit Data Foods</h4>
                    <span>Foods</span>
                </div>
            </div>
            <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Data Foods</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="/food/food_update/<?= $food['id_masakan']; ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <input type="hidden" name="id_masakan" value="<?= $food['id_masakan']; ?>">
                                    <input type="hidden" name="fotolama" value="<?= $food['foto']; ?>">
                                    <label>Nama</label>
                                    <input type="text" class="form-control input-default <?= ($validation->hasError('nama_masakan')) ? 'is-invalid' : ''; ?>" name="nama_masakan" id="nama_masakan" value="<?= (old('nama_masakan')) ? old('nama_masakan') : $food['nama_masakan']; ?>" placeholder="Masukan Nama Anda">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_masakan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>harga</label>
                                    <input type="number" class="form-control input-default <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" id="harga" value="<?= (old('harga')) ? old('harga') : $food['harga']; ?>" placeholder="Masukan harga Anda">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status Makanan:</label>
                                    <select class="form-control default-select" id="status_masakan" <?= ($validation->hasError('status_masakan')) ? 'is-invalid' : ''; ?> name="status_masakan" id="status_masakan" value="<?= (old('status_masakan')) ? old('status_masakan') : $food['status_masakan']; ?>">
                                        <option value="<?= $food['status_masakan']; ?>"><?= $food['status_masakan']; ?></option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_masakan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div class="col-sm-2 pb-1">
                                        <img src="<?= base_url('foto/food/' . $food['foto']); ?>" class="img-thumbnail img-preview" style="max-width: 120px;  ">
                                    </div>
                                    <div class="col-sm-8 ">
                                        <div class="custom-file ">
                                            <input type="file" class=" custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto">
                                            <input type="file" class="dropify custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" style="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto'); ?>
                                            </div>
                                            <label class="custom-file-label" for="foto"><?= $food['foto']; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="location.href='<?= base_url('food/food'); ?>'">Batal</button>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
          Content body end
      ***********************************-->


<?= $this->endSection(); ?>