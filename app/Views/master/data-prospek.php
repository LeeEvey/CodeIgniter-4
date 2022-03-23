<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Prospek</h1>

    <a class="btn btn-info mb-3" href="/dataMaster/createProspek">Tambah Data</a>

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
        <div class="col text-center">
            <div class="limiter">
                <div class="wrap-table1">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1 text-center">No</th>
                                        <th class="cell100 column7 text-center">Nama Customer</th>
                                        <th class="cell100 column7 text-center">Status Hubungan</th>
                                        <th class="cell100 column7 text-center">No Telepon</th>
                                        <th class="cell100 column7 text-center">Proyek Diminati</th>
                                        <th class="cell100 column7 text-center">Range Harga</th>
                                        <th class="cell100 column7 text-center">Jadwal Survei</th>
                                        <th class="cell100 column7 text-center">Status Prospek</th>
                                        <th class="cell100 column7 text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    <?php $no = 1;
                                    $db = \Config\Database::connect();
                                    $query   = $db->query('SELECT id_prospek, nama_customer, status_hubungan, no_telepon, proyek_diminati, range_harga, jadwal_survei, status_prospek FROM prospek WHERE status_prospek != "akad" ');
                                    $results = $query->getResultArray();
                                    foreach ($results as $row) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column1"><?= $no++; ?>.</td>
                                            <td class="cell100 column7"><?= $row['nama_customer']; ?></td>
                                            <td class="cell100 column7"><?= $row['status_hubungan']; ?></td>
                                            <td class="cell100 column7"><?= $row['no_telepon']; ?></td>
                                            <td class="cell100 column7"><?= $row['proyek_diminati']; ?></td>
                                            <td class="cell100 column7"><?= $row['range_harga']; ?></td>
                                            <td class="cell100 column7"><?= $row['jadwal_survei']; ?></td>
                                            <td class="cell100 column7"><?= $row['status_prospek']; ?></td>
                                            <td class="cell100 column11">
                                                <a href="/dataMaster/deleteProspek/<?= $row['id_prospek']; ?>" class="badge btn-danger" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                                <a href="/dataMaster/editProspek/<?= $row['id_prospek']; ?>" class="badge btn-warning"><i class="fas fa-edit"></i></a>
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