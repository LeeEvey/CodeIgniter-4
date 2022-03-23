<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data & Pencairan Komisi User</h1>

    <div class="row">
        <div class="col-lg">

            <table class="table text-center">
                <thead>
                    <tr class="table-success">
                        <th scope="col">No</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Nama Proyek</th>
                        <th scope="col">Komisi</th>
                        <th scope="col">Total Komisi</th>
                        <th scope="col">Tanggal Pencairan</th>
                        <th scope="col">Status Pencairan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-danger" scope="row">1</th>
                        <td>Leandro</td>
                        <td>The Crystal Residence</td>
                        <td>Rp2.2 JT</td>
                        <td>Rp2.2 JT</td>
                        <td>29 Agustus 2021</td>
                        <td>Cair</td>
                        <td><a class="btn btn-success" href="">Ubah</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>