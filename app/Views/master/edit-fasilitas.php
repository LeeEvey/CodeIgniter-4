<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Fasilitas</h1>

    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/dataMaster/updateFasilitas/<?= $fasilitas['id_fasilitas']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <section>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <label for="nama_fasilitas" class="col-form-label">Nama Fasilitas</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_fasilitas')) ? 'is-invalid' : ''; ?>" id="nama_fasilitas" name="nama_fasilitas" autofocus value="<?= (old('nama_fasilitas')) ? old('nama_fasilitas') : $fasilitas['nama_fasilitas'] ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama_fasilitas'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <label for="icon" class="col-form-label">Nama icon</label>
                            <input type="text" class="form-control <?= ($validation->hasError('icon')) ? 'is-invalid' : ''; ?>" id="icon" name="icon" autofocus value="<?= (old('icon')) ? old('icon') : $fasilitas['icon'] ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('icon'); ?>
                            </div>
                        </div>
                    </div>
                </section><br>
                <button type="submit" class="btn btn-primary" style="font-size: 12px;">Ubah Data</button>
                <a href="/dataMaster/dataFasilitas" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>