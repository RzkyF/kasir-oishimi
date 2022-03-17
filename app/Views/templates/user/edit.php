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
                    <h4>Form Edit Data Users</h4>
                    <span>Users</span>
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
                        <h4 class="card-title">Form Edit Data Users</h4>
                    </div>
                    <?php if (session()->get('id_level') == 1) { ?>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/user/user_update/<?= $user['id_user']; ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                        <input type="hidden" name="fotolama" value="<?= $user['foto']; ?>">
                                        <label>Nama</label>
                                        <input type="text" class="form-control input-default <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" name="nama_user" id="nama_user" value="<?= (old('nama_user')) ? old('nama_user') : $user['nama_user']; ?>" placeholder="Masukan Nama Anda">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_user'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control input-default <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" value="<?= (old('username')) ? old('username') : $user['username']; ?>" placeholder="Masukan Username Anda">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control input-default <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" value="<?= (old('password')) ? old('password') : $user['password']; ?>" placeholder="Masukan Password Anda">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="col-sm-2 pb-1">
                                            <img src="<?= base_url('foto/user/' . $user['foto']); ?>" class="img-thumbnail img-preview" style="max-width: 120px;  ">
                                        </div>
                                        <div class="col-sm-8 ">
                                            <div class="custom-file ">
                                                <input type="file" class=" custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto">
                                                <input type="file" class="dropify custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" style="">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('foto'); ?>
                                                </div>
                                                <label class="custom-file-label" for="foto"><?= $user['foto']; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id_level" id="id_level" class="input" value="3">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="location.href='<?= base_url('user/user'); ?>'">Batal</button>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (session()->get('id_level') == 2) { ?>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/user/user_update/<?= $user['id_user']; ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                        <input type="hidden" name="fotolama" value="<?= $user['foto']; ?>">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <div class="col-sm-2 pb-1">
                                                <img src="<?= base_url('foto/user/' . $user['foto']); ?>" class="img-thumbnail img-preview" style="max-width: 120px;  ">
                                            </div>
                                            <div class="col-sm-8 ">
                                                <div class="custom-file ">
                                                    <input type="file" class=" custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto">
                                                    <input type="file" class="dropify custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" style="">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="foto"><?= $user['foto']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id_level" id="id_level" class="input" value="3">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary" onclick="location.href='<?= base_url('user/profile'); ?>'">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
          Content body end
      ***********************************-->


<?= $this->endSection(); ?>