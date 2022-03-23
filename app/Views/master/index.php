<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Member</h1>

    <a class="btn btn-info mb-3" href="/dataMaster/create">Tambah Data</a>

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
        <div class="col-md-8 text-center">
            <div class="limiter">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1 text-center">No</th>
                                        <th class="cell100 column12 text-center">Nama Member</th>
                                        <th class="cell100 column3 text-center">Waktu Bergabung</th>
                                        <th class="cell100 column4 text-center">Status Member</th>
                                        <th class="cell100 column5 text-center">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($member as $m) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column1"><?= $no++; ?>.</td>
                                            <td class="cell100 column12"><?= $m['nama_member']; ?></td>
                                            <td class="cell100 column3"><?= $m['created_at']; ?></td>
                                            <td class="cell100 column4"><?= $m['status_member']; ?></td>
                                            <td class="cell100 column5">
                                                <a href="/dataMaster/delete/<?= $m['id_member']; ?>" class="badge btn-danger" onclick="return confirm('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                                <a href="/dataMaster/edit/<?= $m['id_member']; ?>" class="badge btn-warning"><i class="fas fa-edit"></i></a>
                                                <a id="detail" href="" class="badge btn-success" data-nama_member="<?= $m['nama_member']; ?>" data-alamat="<?= $m['alamat']; ?>" data-handphone="<?= $m['handphone']; ?>" data-nama_rekening="<?= $m['nama_rekening']; ?>" data-nama_bank="<?= $m['nama_bank']; ?>" data-no_rekening="<?= $m['no_rekening']; ?>" data-foto_ktp="<?= $m['foto_ktp']; ?>" data-fotodiri_ktp="<?= $m['fotodiri_ktp']; ?>" data-foto_profile="<?= $m['foto_profile']; ?>" data-foto_rekening="<?= $m['foto_rekening']; ?>" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-info-circle"></i></a>
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

        <div class="col-md-4 text-center">
            <div class="limiter">
                <div class="wrap-table">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column6 text-center">Email</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    <?php
                                    foreach ($user as $s) : ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column6"><?= $s['email']; ?></td>
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
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-3" id="IsiModal">
                    </div>
                    <div class="col-md-5">
                        <p>
                            <i class="fas fa-user"></i>&nbsp;
                            <span id="nama_member"></span>
                        </p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>&nbsp;
                            <span id="alamat"></span>
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>&nbsp;
                            <span id="handphone"></span>
                        </p>
                        <p>
                            <i class="fas fa-user"></i>&nbsp;
                            <span id="nama_rekening"></span>
                        </p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>&nbsp;
                            <span id="nama_bank"></span>
                        </p>
                        <p>
                            <i class="fas fa-dice-five"></i>&nbsp;
                            <span id="no_rekening"></span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <i class="fas fa-id-card">&nbsp;Foto KTP :</i>
                            <span id="foto_ktp"></span>
                        </p>
                        <p>
                            <i class="fas fa-address-card">&nbsp;Foto Diri & KTP :</i>&nbsp;
                            <span id="fotodiri_ktp"></span>
                        </p>
                        <p>
                            <i class="fas fa-credit-card">&nbsp;Foto Rekening :</i>&nbsp;
                            <span id="foto_rekening"></span>
                        </p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>