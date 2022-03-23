<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <!-- Jumbotron -->
    <?php if (session()->has('logged_in') and session()->get('logged_in') == true) : ?>
        <section class="jumbotron text-center">
            <div class="row">
                <div class="col mb-5">
                    <img src="<?= base_url(); ?>/img/profile/<?= $member['foto_profile']; ?>" class="rounded-circle img-thumbnail" style="background-size: cover; box-sizing: border-box; max-width: 150px;" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-5" style="text-align: left;">
                    <p>
                        <i class="fas fa-user"></i>&nbsp;
                        <span><?= $member['nama_member']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>&nbsp;
                        <span><?= $member['alamat']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-phone"></i></i>&nbsp;
                        <span><?= $member['handphone']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-id-card"></i></i>&nbsp;
                        <span><?= $member['foto_ktp']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-address-card"></i></i>&nbsp;
                        <span><?= $member['fotodiri_ktp']; ?></span>
                    </p>
                </div>
                <div class="col-md-5" style="text-align: left;">
                    <p>
                        <i class="fas fa-envelope"></i>&nbsp;
                        <span><?= $user['email']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-user"></i>&nbsp;
                        <span><?= $member['nama_rekening']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>&nbsp;
                        <span><?= $member['nama_bank']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-dice-five"></i></i>&nbsp;
                        <span><?= $member['no_rekening']; ?></span>
                    </p>
                    <p>
                        <i class="fas fa-credit-card"></i></i>&nbsp;
                        <span><?= $member['foto_rekening']; ?></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align: left;">
                    <a href="/dataMaster" class="btn btn-info mt-3" style="font-size: 12px; display:inline">Kembali</a>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Akhir Jumbotron -->
</div>

<?= $this->endSection(); ?>