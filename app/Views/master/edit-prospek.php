<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Prospek</h1>

    <div class="row">
        <div class="col">
            <?php //$validation->listErrors(); 
            ?>
            <form action="/dataMaster/updateProspek/<?= $prospek['id_prospek']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_prospek" value="<?= $prospek['id_prospek']; ?>">
                <input type="hidden" name="nama_member" value="<?= $komisi['nama_member']; ?>">
                <div class="row mb-3">
                    <label for="nama_customer" class="col-sm-1 col-form-label">Nama Customer</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_customer')) ? 'is-invalid' : ''; ?>" id="nama_customer" name="nama_customer" autofocus value="<?= (old('nama_customer')) ? old('nama_customer') : $prospek['nama_customer'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_customer'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telepon" class="col-sm-1 col-form-label">No Telepon</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" id="no_telepon" name="no_telepon" autofocus value="<?= (old('no_telepon')) ? old('no_telepon') : $prospek['no_telepon'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('no_telepon'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="status_hubungan" class="col-form-label">Status Hubungan : </label>
                        <select name="status_hubungan" id="status_hubungan">
                            <option value="<?= (old('status_hubungan')) ? old('status_hubungan') : $prospek['status_hubungan'] ?>"><?= (old('status_hubungan')) ? old('status_hubungan') : $prospek['status_hubungan'] ?></option>
                            <option value="Teman">Teman</option>
                            <option value="Keluarga">Keluarga</option>
                            <option value="Kolega">Kolega</option>
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
                    <div class="col-sm-5">
                        <label for="proyek_diminati" class="col-form-label">Proyek Yang Diminati : </label>
                        <select name="proyek_diminati" id="proyek_diminati">
                            <option value="<?= (old('proyek_diminati')) ? old('proyek_diminati') : $prospek['proyek_diminati'] ?>"><?= (old('proyek_diminati')) ? old('proyek_diminati') : $prospek['proyek_diminati'] ?></option>
                            <?php
                            $db = \Config\Database::connect();
                            $query   = $db->query('SELECT nama_proyek FROM proyek WHERE is_active = 1 AND nonzone = 0');
                            $results = $query->getResultArray();
                            foreach ($results as $row) : ?>
                                <option value="<?= $row['nama_proyek']; ?>"><?= $row['nama_proyek']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="range_harga" class="col-sm-1 col-form-label">Range Harga</label>
                    <div class="col-sm-2">
                        <select name="range_harga" id="range_harga">
                            <option value="<?= (old('range_harga')) ? old('range_harga') : $prospek['range_harga'] ?>"><?= (old('range_harga')) ? old('range_harga') : $prospek['range_harga'] ?></option>
                            <option value="Dibawah 500jt">Dibawah 500jt</option>
                            <option value="500jt - 1M">500jt - 1M</option>
                            <option value="Diatas 1M">Diatas 1M</option>
                        </select>
                    </div>
                    <label for="jadwal_survei" class="col-sm-1 col-form-label">Jadwal Survei</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control <?= ($validation->hasError('jadwal_survei')) ? 'is-invalid' : ''; ?>" id="jadwal_survei" name="jadwal_survei" autofocus value="<?= (old('jadwal_survei')) ? old('jadwal_survei') : $prospek['jadwal_survei'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('jadwal_survei'); ?>
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
                <a href="/dataMaster/dataProspek" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>