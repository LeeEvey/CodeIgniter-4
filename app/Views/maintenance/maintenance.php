<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 text-right">
            <p class="text-left">Backup</p>
            <p class="text-left">Silahkan pilih database yang ingin dibackup</p>
            <table class="table text-center">
                <thead>
                    <tr class="table">
                        <th scope="col">Database</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>bpc-admin</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>bpc-marketing</td>
                        <td><input type="checkbox"></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary mt-3" href="">Backup</button>
        </div>
        <div class="col-md-4">
            <p>Restore</p>
            <p>Silahkan masukkan file database yang ingin direstore</p>
            <input type="file" id="" name="">
            <button class="btn btn-primary mt-3" href="">Restore</button>
        </div>
        <div class="col-md-4">
            <p>Import Data</p>
            <p>Silahkan masukkan file yang akan diimport datanya</p>
            <table class="table text-center">
                <thead>
                    <tr class="table">
                        <th scope="col">Database</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>bpc-admin</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>bpc-marketing</td>
                        <td><input type="checkbox"></td>
                    </tr>
                </tbody>
            </table>
            <input type="file" id="" name="">
            <button class="btn btn-primary mt-3" href="">Import</button>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>