<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage User & Role</h1>

    <div class="row">
        <div class="col-lg">

            <table class="table text-center">
                <thead>
                    <tr class="table-warning">
                        <th scope="col">No</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Role</th>
                        <th scope="col">Ubah Role</th>
                        <th scope="col">Hapus Member</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-danger" scope="row">1</th>
                        <td>John Doe</td>
                        <td>member</td>
                        <td><a class="btn btn-info" href="">Ubah</a></td>
                        <td><a class="btn btn-danger" href="">Hapus</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>