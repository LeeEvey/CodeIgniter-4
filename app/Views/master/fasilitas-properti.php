<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Fasilitas Properti</h1>

    <a class="btn btn-info mb-3" href="/dataMaster/createFasilitas">Tambah Data</a>

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
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1 text-center">No</th>
                                        <th class="cell100 column2 text-center">Id Fasilitas</th>
                                        <th class="cell100 column10 text-center">Nama Fasilitas</th>
                                        <th class="cell100 column4 text-center">icon</th>
                                        <th class="cell100 column5 text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($fasilitas as $f) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column1"><?= $no++; ?>.</td>
                                            <td class="cell100 column2"><?= $f['id_fasilitas']; ?></td>
                                            <td class="cell100 column10 text-left"><?= $f['nama_fasilitas']; ?></td>
                                            <td class="cell100 column4"><i class="<?= $f['icon']; ?>"></i></td>
                                            <td class="cell100 column5">
                                                <a href="/dataMaster/deleteFasilitas/<?= $f['id_fasilitas']; ?>" class="badge btn-danger" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                                <a href="/dataMaster/editFasilitas/<?= $f['id_fasilitas']; ?>" class="badge btn-warning"><i class="fas fa-edit"></i></a>
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