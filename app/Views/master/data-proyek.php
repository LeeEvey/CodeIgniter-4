<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Proyek</h1>

    <a class="btn btn-info mb-3" href="/dataMaster/createProyek">Tambah Data</a>

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
                                        <th class="cell100 column7 text-center">Id Proyek</th>
                                        <th class="cell100 column8 text-center">Lokasi</th>
                                        <th class="cell100 column9 text-center">Harga Terendah</th>
                                        <th class="cell100 column5 text-center">Status Proyek</th>
                                        <th class="cell100 column6 text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($detail as $d) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column1"><?= $no++; ?>.</td>
                                            <td class="cell100 column7"><?= $d['id_proyek']; ?></td>
                                            <td class="cell100 column8 text-left"><?= $d['lokasi_proyek']; ?></td>
                                            <td class="cell100 column9">Rp<?= $d['harga_terendah']; ?> JT</td>
                                            <td class="cell100 column5"><?= $d['status_proyek']; ?></td>
                                            <td class="cell100 column6">
                                                <a href="/dataMaster/deleteProyek/<?= $d['id_detail']; ?>" class="badge btn-danger" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                                <a href="/dataMaster/editProyek/<?= $d['id_detail']; ?>" class="badge btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="/dataMaster/detailProyek/<?= $d['id_proyek']; ?>" class="badge btn-success"><i class="fas fa-info-circle"></i></a>
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