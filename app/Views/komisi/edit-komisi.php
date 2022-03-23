<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Komisi</h1>

    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/komisi/updateKomisi/<?= $prospek['id_prospek']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_prospek" value="<?= $prospek['id_prospek']; ?>">
                <input type="hidden" name="nama_customer" value="<?= $prospek['nama_customer']; ?>">
                <input type="hidden" name="no_telepon" value="<?= $prospek['no_telepon']; ?>">
                <input type="hidden" name="status_hubungan" value="<?= $prospek['status_hubungan']; ?>">
                <input type="hidden" name="proyek_diminati" value="<?= $prospek['proyek_diminati']; ?>">
                <input type="hidden" name="range_harga" value="<?= $prospek['range_harga']; ?>">
                <input type="hidden" name="jadwal_survei" value="<?= $prospek['jadwal_survei']; ?>">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="nama_member" class="col-form-label">Nama Member</label>
                        <select name="nama_member" id="nama_member">
                            <option value="<?= (old('nama_member')) ? old('nama_member') : $komisi['nama_member'] ?>"><?= (old('nama_member')) ? old('nama_member') : $komisi['nama_member'] ?></option>
                            <?php
                            $db = \Config\Database::connect();
                            $query   = $db->query('SELECT nama_member FROM member_profile');
                            $results = $query->getResultArray();
                            foreach ($results as $row) : ?>
                                <option value="<?= $row['nama_member']; ?>"><?= $row['nama_member']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="status_pencairan" class="col-form-label">Status Pencairan : </label>
                        <select name="status_pencairan" id="status_pencairan">
                            <option value="<?= (old('status_pencairan')) ? old('status_pencairan') : $komisi['status_pencairan'] ?>"><?= (old('status_pencairan')) ? old('status_pencairan') : $komisi['status_pencairan'] ?></option>
                            <option value="Cair">Cair</option>
                            <option value="Belum Cair">Belum Cair</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="status_prospek" class="col-form-label">Status Prospek : </label>
                        <select name="status_prospek" id="status_prospek">
                            <option value="<?= (old('status_prospek')) ? old('status_prospek') : $prospek['status_prospek'] ?>"><?= (old('status_prospek')) ? old('status_prospek') : $prospek['status_prospek'] ?></option>
                            <option value="Closing">Closing</option>
                            <option value="Sp3k">Sp3k</option>
                            <option value="Akad">Akad</option>
                            <option value="Reject">Reject</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="komisi" class="col-sm-1 col-form-label">Komisi</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control <?= ($validation->hasError('komisi')) ? 'is-invalid' : ''; ?>" id="komisi" name="komisi" autofocus value="<?= (old('komisi')) ? old('komisi') : $komisi['komisi'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('komisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-1 col-form-label">Keterangan</label>
                    <div class="col-sm-5">
                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan"><?= (old('keterangan')) ? old('keterangan') : $prospek['keterangan'] ?></textarea>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="font-size: 12px;">Ubah Data</button>
                <a href="/komisi/index" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>