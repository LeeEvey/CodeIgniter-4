<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Komisi</h1>

    <div class="row">
        <div class="col-md-4 text-center">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 text-center">
            <div class="limiter">
                <div class="wrap-table2">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1 text-center">No</th>
                                        <th class="cell100 column12 text-center">Nama Member</th>
                                        <th class="cell100 column12 text-center">Komisi</th>
                                        <th class="cell100 column12 text-center">Status Pencairan</th>
                                        <th class="cell100 column12 text-center">Status Prospek</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body mt-3 js-pscroll">
                            <table>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $db = \Config\Database::connect();
                                    $query   = $db->query('SELECT nama_member, komisi, status_pencairan, status_prospek FROM komisi WHERE status_prospek = "akad" ');
                                    $results = $query->getResultArray();
                                    foreach ($results as $row) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column1"><?= $no++; ?>.</td>
                                            <td class="cell100 column12"><?= $row['nama_member']; ?></td>
                                            <td class="cell100 column12">Rp<?= $row['komisi']; ?> JT</td>
                                            <td class="cell100 column12"><?= $row['status_pencairan']; ?></td>
                                            <td class="cell100 column12"><?= $row['status_prospek']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="limiter">
                <div class="wrap-table3">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column12 text-center">Nama Customer</th>
                                        <th class="cell100 column12 text-center">Proyek Diminati</th>
                                        <th class="cell100 column12 text-center">Jadwal Survei</th>
                                        <th class="cell100 column12 text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body mt-3 js-pscroll">
                            <table>
                                <tbody>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $query   = $db->query('SELECT id_prospek, nama_customer,proyek_diminati, jadwal_survei FROM prospek WHERE status_prospek = "akad" ');
                                    $results = $query->getResultArray();
                                    foreach ($results as $row) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column12"><?= $row['nama_customer']; ?></td>
                                            <td class="cell100 column12"><?= $row['proyek_diminati']; ?></td>
                                            <td class="cell100 column12"><?= $row['jadwal_survei']; ?></td>
                                            <td class="cell100 column12">
                                                <a href="/dataMaster/deleteProspek/<?= $row['id_prospek']; ?>" class="badge btn-danger" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                                <a href="/komisi/editKomisi/<?= $row['id_prospek']; ?>" class="badge btn-warning"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>


</div>

</div>

<?= $this->endSection(); ?>