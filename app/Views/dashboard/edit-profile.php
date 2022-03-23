<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Profile</h1>

    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/home/updateProfile/<?= session()->get('id_member') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_member" value="<?= session()->get('id_member') ?>">
                <input type="hidden" name="password" value="<?= session()->get('password') ?>">
                <input type="hidden" name="foto_ktpLama" value="<?= session()->get('foto_ktp') ?>">
                <input type="hidden" name="fotodiri_ktpLama" value="<?= session()->get('fotodiri_ktp') ?>">
                <input type="hidden" name="foto_profileLama" value="<?= session()->get('foto_profile') ?>">
                <input type="hidden" name="foto_rekeningLama" value="<?= session()->get('foto_rekening') ?>">
                <input type="hidden" name="status_member" value="<?= session()->get('status_member') ?>">
                <input type="hidden" name="no_whatsapp" value="<?= session()->get('no_whatsapp') ?>">
                <input type="hidden" name="jenis_kelamin" value="<?= session()->get('jenis_kelamin') ?>">
                <input type="hidden" name="usia" value="<?= session()->get('usia') ?>">
                <input type="hidden" name="pekerjaan" value="<?= session()->get('pekerjaan') ?>">
                <input type="hidden" name="rekomendasi" value="<?= session()->get('rekomendasi') ?>">
                <div class="row mb-3">
                    <label for="nama_member" class="col-sm-1 col-form-label">Nama Member</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_member')) ? 'is-invalid' : ''; ?>" id="nama_member" name="nama_member" autofocus value="<?= (old('nama_member')) ? old('nama_member') : session()->get('nama_member') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_member'); ?>
                        </div>
                    </div>
                    <label for="alamat" class="col-sm-1 col-form-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : session()->get('alamat') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : session()->get('email') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                    <label for="handphone" class="col-sm-1 col-form-label">No Handphone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('handphone')) ? 'is-invalid' : ''; ?>" id="handphone" name="handphone" value="<?= (old('handphone')) ? old('handphone') : session()->get('handphone') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('handphone'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_rekening" class="col-sm-1 col-form-label">Nama Rekening</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_rekening')) ? 'is-invalid' : ''; ?>" id="nama_rekening" name="nama_rekening" value="<?= (old('nama_rekening')) ? old('nama_rekening') : session()->get('nama_rekening') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_rekening'); ?>
                        </div>
                    </div>
                    <label for="nama_bank" class="col-sm-1 col-form-label">Nama Bank</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_bank')) ? 'is-invalid' : ''; ?>" id="nama_bank" name="nama_bank" value="<?= (old('nama_bank')) ? old('nama_bank') : session()->get('nama_bank') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_bank'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_rekening" class="col-sm-1 col-form-label">No Rekening</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('no_rekening')) ? 'is-invalid' : ''; ?>" id="no_rekening" name="no_rekening" value="<?= (old('no_rekening')) ? old('no_rekening') : session()->get('no_rekening') ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_rekening'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto_ktp" class="col-sm-1 col-form-label">Foto KTP</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto_ktp')) ? 'is-invalid' : ''; ?>" id="foto_ktp" name="foto_ktp"><?= session()->get('foto_ktp') ?>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto_ktp'); ?>
                            </div>
                        </div>
                    </div>
                    <label for="foto_rekening" class="col-sm-1 col-form-label">Foto Buku Rekening</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto_rekening')) ? 'is-invalid' : ''; ?>" id="foto_rekening" name="foto_rekening"><?= session()->get('foto_rekening') ?>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto_rekening'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fotodiri_ktp" class="col-sm-1 col-form-label">Foto diri & KTP</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('fotodiri_ktp')) ? 'is-invalid' : ''; ?>" id="fotodiri_ktp" name="fotodiri_ktp"><?= session()->get('fotodiri_ktp') ?>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('fotodiri_ktp'); ?>
                            </div>
                        </div>
                    </div>
                    <label for="foto_profile" class="col-sm-1 col-form-label">Foto Profile</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto_profile')) ? 'is-invalid' : ''; ?>" id="foto_profile" name="foto_profile"><?= session()->get('foto_profile') ?>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto_profile'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="font-size: 12px;">Ubah Data</button>
                <a href="/home/profile" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>