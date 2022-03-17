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
                    <h4>Form Tambah Data Transaksi</h4>
                    <span>Transaksi</span>
                </div>
            </div>
            <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Data Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url('/transaksi/transaksi_tambah'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label>Nama :</label>
                                    <select class="form-control default-select" id="id_user" <?= ($validation->hasError('id_user')) ? 'is-invalid' : ''; ?> name="id_user" id="id_user" value="<?= old('id_user'); ?>">
                                        <option value="">Pilih User</option>
                                        <?php foreach ($user as $u) : ?>
                                            <option value="<?= $u['id_user']; ?>"><?= $u['nama_user']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_user'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal :</label>
                                    <input type="date" class="form-control input-default <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" id="tanggal" value="<?= old('tanggal'); ?>" placeholder="Masukan Nama ">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Total Bayar :</label>
                                    <input type="number" class="form-control input-default <?= ($validation->hasError('total_bayar')) ? 'is-invalid' : ''; ?>" name="total_bayar" id="total_bayar" value="<?= old('total_bayar'); ?>" placeholder="Masukan Total Bayar">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('total_bayar'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Meja :</label>
                                    <input type="number" class="form-control input-default <?= ($validation->hasError('no_meja')) ? 'is-invalid' : ''; ?>" name="no_meja" id="no_meja" value="<?= old('no_meja'); ?>" placeholder="Masukan No Meja">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('no_meja'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan :</label>
                                    <input type="text" class="form-control input-default <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan" id="keterangan" value="<?= old('keterangan'); ?>" placeholder="Masukan Keterangan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status Order :</label>
                                    <select class="form-control default-select" id="status_order" <?= ($validation->hasError('status_order')) ? 'is-invalid' : ''; ?> name="status_order" id="status_order" value="<?= old('status_order'); ?>">
                                        <option value="proses">proses</option>
                                        <option value="selesai">selesai</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_order'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Food :</label>
                                    <select class="form-control default-select" id="id_masakan" <?= ($validation->hasError('id_masakan')) ? 'is-invalid' : ''; ?> name="id_masakan" id="id_masakan" value="<?= old('id_masakan'); ?>">
                                        <option value="">Pilih Food</option>
                                        <?php foreach ($food as $u) : ?>
                                            <option value="<?= $u['id_masakan']; ?>"><?= $u['nama_masakan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_masakan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Drink :</label>
                                    <?php foreach ($drink as $u) : ?>
                                        <select class="form-control default-select" id="id_minuman" <?= ($validation->hasError('id_minuman')) ? 'is-invalid' : ''; ?> name="id_minuman" id="id_minuman" value="<?= old('id_minuman'); ?>">
                                            <option value="">Pilih Drink</option>
                                            <option value="<?= $u['id_minuman']; ?>"><?= $u['nama_minuman']; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_minuman'); ?>
                                        </div>
                                </div>

                                <button type="button" class="btn btn-secondary mt-4" onclick="location.href='<?= base_url('transaksi/transaksi'); ?>'">Batal</button>
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
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