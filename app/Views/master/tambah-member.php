<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Member</h1>

    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/dataMaster/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_member" class="col-sm-1 col-form-label">Nama Member</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_member')) ? 'is-invalid' : ''; ?>" id="nama_member" name="nama_member" autofocus value="<?= old('nama_member'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_member'); ?>
                        </div>
                    </div>
                    <label for="alamat" class="col-sm-1 col-form-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                    <label for="handphone" class="col-sm-1 col-form-label">No Handphone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('handphone')) ? 'is-invalid' : ''; ?>" id="handphone" name="handphone" value="<?= old('handphone'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('handphone'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="whatsapp" class="col-sm-1 col-form-label">No Whatsapp</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('whatsapp')) ? 'is-invalid' : ''; ?>" id="whatsapp" name="whatsapp" value="<?= old('whatsapp'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('whatsapp'); ?>
                        </div>
                    </div>
                    <label for="usia" class="col-sm-1 col-form-label">Usia</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('usia')) ? 'is-invalid' : ''; ?>" id="usia" name="usia" value="<?= old('usia'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('usia'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-1 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option value="pilih">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <label for="pekerjaan" class="col-sm-1 col-form-label">Pekerjaan Saat Ini</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('pekerjaan'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-1 col-form-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <label for="cpassword" class="col-sm-1 col-form-label">Password Konfirmasi</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('cpassword')) ? 'is-invalid' : ''; ?>" id="cpassword" name="cpassword" value="<?= old('cpassword'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('cpassword'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_rekening" class="col-sm-1 col-form-label">Nama Rekening</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_rekening')) ? 'is-invalid' : ''; ?>" id="nama_rekening" name="nama_rekening" value="<?= old('nama_rekening'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_rekening'); ?>
                        </div>
                    </div>
                    <label for="nama_bank" class="col-sm-1 col-form-label">Nama Bank</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_bank')) ? 'is-invalid' : ''; ?>" id="nama_bank" name="nama_bank" value="<?= old('nama_bank'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_bank'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_rekening" class="col-sm-1 col-form-label">No Rekening</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('no_rekening')) ? 'is-invalid' : ''; ?>" id="no_rekening" name="no_rekening" value="<?= old('no_rekening'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_rekening'); ?>
                        </div>
                    </div>
                    <label for="rekomendasi" class="col-sm-1 col-form-label">Staff yang merekomendasi</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('rekomendasi')) ? 'is-invalid' : ''; ?>" id="rekomendasi" name="rekomendasi" value="<?= old('rekomendasi'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('rekomendasi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto_ktp" class="col-sm-1 col-form-label">Foto KTP</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto_ktp')) ? 'is-invalid' : ''; ?>" id="foto_ktp" name="foto_ktp">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto_ktp'); ?>
                            </div>
                        </div>
                    </div>
                    <label for="foto_rekening" class="col-sm-1 col-form-label">Foto Buku Rekening</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto_rekening')) ? 'is-invalid' : ''; ?>" id="foto_rekening" name="foto_rekening">
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
                            <input type="file" class="form-control <?= ($validation->hasError('fotodiri_ktp')) ? 'is-invalid' : ''; ?>" id="fotodiri_ktp" name="fotodiri_ktp">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('fotodiri_ktp'); ?>
                            </div>
                        </div>
                    </div>
                    <label for="foto_profile" class="col-sm-1 col-form-label">Foto Profile</label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('foto_profile')) ? 'is-invalid' : ''; ?>" id="foto_profile" name="foto_profile">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto_profile'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="font-size: 12px;">Tambah Data</button>
                <a href="/dataMaster" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>