<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Proyek</h1>


    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/dataMaster/saveProyek" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <section>
                    <h5>Informasi Proyek</h5><br>
                    <div class="row mb-3">
                        <div class="col-sm-3">
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
                        <div class="col-sm-4">
                            <label for="lokasi_proyek" class="col-form-label">Lokasi</label>
                            <input type="text" class="form-control <?= ($validation->hasError('lokasi_proyek')) ? 'is-invalid' : ''; ?>" id="lokasi_proyek" name="lokasi_proyek" autofocus value="<?= old('lokasi_proyek'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('lokasi_proyek'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga_terendah" class="col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;Harga Terendah</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control <?= ($validation->hasError('harga_terendah')) ? 'is-invalid' : ''; ?>" id="harga_terendah" name="harga_terendah" value="<?= old('harga_terendah'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('harga_terendah'); ?>
                            </div>
                        </div>
                        <label for="kamar_tidur" class="col-form-label">Kamar Tidur</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control <?= ($validation->hasError('kamar_tidur')) ? 'is-invalid' : ''; ?>" id="kamar_tidur" name="kamar_tidur" autofocus value="<?= old('kamar_tidur'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('kamar_tidur'); ?>
                            </div>
                        </div>
                        <label for="kamar_mandi" class="col-form-label">Kamar Mandi</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control <?= ($validation->hasError('kamar_mandi')) ? 'is-invalid' : ''; ?>" id="kamar_mandi" name="kamar_mandi" autofocus value="<?= old('kamar_mandi'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('kamar_mandi'); ?>
                            </div>
                        </div>
                        <label for="carport" class="col-form-label">Carport</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control <?= ($validation->hasError('carport')) ? 'is-invalid' : ''; ?>" id="carport" name="carport" value="<?= old('carport'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('carport'); ?>
                            </div>
                        </div>
                        <label for="luas_bangunan" class="col-form-label">Luas Bangunan</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control <?= ($validation->hasError('luas_bangunan')) ? 'is-invalid' : ''; ?>" id="luas_bangunan" name="luas_bangunan" autofocus value="<?= old('luas_bangunan'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('luas_bangunan'); ?>
                            </div>
                        </div>
                        <label for="luas_tanah" class="col-form-label">Luas Tanah</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control <?= ($validation->hasError('luas_tanah')) ? 'is-invalid' : ''; ?>" id="luas_tanah" name="luas_tanah" autofocus value="<?= old('luas_tanah'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('luas_tanah'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="informasi_properti" class="col-sm-1 col-form-label">Informasi Properti</label>
                        <div class="col-sm-5">
                            <textarea name="informasi_properti"></textarea>
                            <script>
                                CKEDITOR.replace('informasi_properti');
                            </script>
                        </div>
                        <label for="deskripsi" class="col-sm-1 col-form-label">Deskripsi</label>
                        <div class="col-sm-5">
                            <textarea name="deskripsi"></textarea>
                            <script>
                                CKEDITOR.replace('deskripsi');
                            </script>
                        </div>
                    </div>
                </section>
                <br>
                <hr>
                <section>
                    <h5>Fasilitas Proyek</h5><br>
                    <div class="row mb-3">
                        <label for="fasilitas_kesehatan" class="col-sm-1 col-form-label">Fasilitas</label>
                        <?php foreach ($fasilitas as $f) : ?>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value='<i class="<?= $f['icon']; ?>"></i> <?= $f['nama_fasilitas']; ?>' name="fasilitas[]" id="fasilitas" style="display: inline;">&nbsp;<?= $f['nama_fasilitas']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row mb-3">
                        <label for="fasilitas_kesehatan" class="col-sm-1 col-form-label">Fasilitas Kesehatan</label>
                        <div class="col-sm-5">
                            <textarea name="fasilitas_kesehatan"></textarea>
                            <script>
                                CKEDITOR.replace('fasilitas_kesehatan');
                            </script>
                        </div>
                        <label for="fasilitas_pendidikan" class="col-sm-1 col-form-label">Fasilitas Pendidikan</label>
                        <div class="col-sm-5">
                            <textarea name="fasilitas_pendidikan"></textarea>
                            <script>
                                CKEDITOR.replace('fasilitas_pendidikan');
                            </script>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fasilitas_komersil" class="col-sm-1 col-form-label">Fasilitas Komersil</label>
                        <div class="col-sm-5">
                            <textarea name="fasilitas_komersil"></textarea>
                            <script>
                                CKEDITOR.replace('fasilitas_komersil');
                            </script>
                        </div>
                        <label for="wisata_hiburan" class="col-sm-1 col-form-label">Wisata & Hiburan</label>
                        <div class="col-sm-5">
                            <textarea name="wisata_hiburan"></textarea>
                            <script>
                                CKEDITOR.replace('wisata_hiburan');
                            </script>
                        </div>
                    </div>
                </section>
                <br>
                <hr>
                <section>
                    <h5>Tools Marketing</h5><br>
                    <div class="row mb-3">
                        <label for="brosur" class="col-sm-1 col-form-label">Brosur</label>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('brosur1')) ? 'is-invalid' : ''; ?>" id="brosur1" name="brosur1">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('brosur1'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('brosur2')) ? 'is-invalid' : ''; ?>" id="brosur2" name="brosur2">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('brosur2'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('brosur3')) ? 'is-invalid' : ''; ?>" id="brosur3" name="brosur3">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('brosur3'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="pricelist" class="col-sm-1 col-form-label">Pricelist</label>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('pricelist1')) ? 'is-invalid' : ''; ?>" id="pricelist1" name="pricelist1">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pricelist1'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('pricelist2')) ? 'is-invalid' : ''; ?>" id="pricelist2" name="pricelist2">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pricelist2'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('pricelist3')) ? 'is-invalid' : ''; ?>" id="pricelist3" name="pricelist3">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pricelist3'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="foto" class="col-sm-1 col-form-label">Foto Featured</label>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('featured')) ? 'is-invalid' : ''; ?>" id="featured" name="featured">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('featured'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="foto" class="col-sm-1 col-form-label">Foto</label>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto1')) ? 'is-invalid' : ''; ?>" id="foto1" name="foto1">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto1'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto2')) ? 'is-invalid' : ''; ?>" id="foto2" name="foto2">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto2'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto3')) ? 'is-invalid' : ''; ?>" id="foto3" name="foto3">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto3'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto4')) ? 'is-invalid' : ''; ?>" id="foto4" name="foto4">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto4'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto5')) ? 'is-invalid' : ''; ?>" id="foto5" name="foto5">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto5'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto6')) ? 'is-invalid' : ''; ?>" id="foto6" name="foto6">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto6'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto7')) ? 'is-invalid' : ''; ?>" id="foto7" name="foto7">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto7'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto8')) ? 'is-invalid' : ''; ?>" id="foto8" name="foto8">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto8'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('foto9')) ? 'is-invalid' : ''; ?>" id="foto9" name="foto9">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('foto9'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="video" class="col-sm-1 col-form-label">Video</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= ($validation->hasError('video1')) ? 'is-invalid' : ''; ?>" id="video1" name="video1" autofocus value="<?= old('video1'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('video1'); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= ($validation->hasError('video2')) ? 'is-invalid' : ''; ?>" id="video2" name="video2" autofocus value="<?= old('video2'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('video2'); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= ($validation->hasError('video3')) ? 'is-invalid' : ''; ?>" id="video3" name="video3" autofocus value="<?= old('video3'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('video3'); ?>
                            </div>
                        </div>
                    </div>
                </section>
                <button type="submit" class="btn btn-primary" style="font-size: 12px;">Tambah Data</button>
                <a href="/dataMaster/dataProyek" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>