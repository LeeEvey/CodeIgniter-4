<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Tools Marketing</h1>

    <div class="row">
        <div class="col-md-6 text-center">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/dataMaster/saveUpload" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <section>
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <label for="id_proyek" class="col-form-label">Nama Proyek</label>
                            <select name="id_proyek" id="id_proyek">
                                <option value="pilih">Pilih</option>
                                <?php
                                $db = \Config\Database::connect();
                                $query   = $db->query('SELECT id_proyek, nama_proyek FROM proyek WHERE is_active = 1 AND nonzone = 0');
                                $results = $query->getResultArray();
                                foreach ($results as $row) : ?>
                                    <option value="<?= $row['id_proyek']; ?>"><?= $row['nama_proyek']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <label for="jenis_file" class="col-form-label">Jenis File</label>
                            <select name="jenis_file" id="jenis_file">
                                <option value="pilih">Pilih</option>
                                <option value="brosur">Brosur</option>
                                <option value="foto">Foto</option>
                                <option value="featured">Featured</option>
                                <option value="pricelist">Pricelist</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('nama_file')) ? 'is-invalid' : ''; ?>" id="nama_file" name="nama_file[]" multiple="true">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_file'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <button type="submit" class="btn btn-primary" style="font-size: 12px;">Tambah Data</button>
                <a href="/dataMaster/dataProyek" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Data Proyek</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>