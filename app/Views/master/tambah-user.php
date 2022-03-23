<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Tabel User</h1>

    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/dataMaster/saveUser" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
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
                </div>
                <div class="row mb-3">
                    <label for="cpassword" class="col-sm-1 col-form-label">Password Konfirmasi</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('cpassword')) ? 'is-invalid' : ''; ?>" id="cpassword" name="cpassword" value="<?= old('cpassword'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('cpassword'); ?>
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