<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan Pengguna</h1>

    <div class="row">
        <div class="col-lg-8">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>/img/profile/default.jpg" width="100px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4>nama</h4>
                                </li>
                                <li class="list-group-item">
                                    nama lengkap
                                </li>
                                <li class="list-group-item">
                                    email
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>

</div>

<?= $this->endSection(); ?>