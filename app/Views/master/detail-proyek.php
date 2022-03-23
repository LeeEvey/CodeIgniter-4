<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Proyek</h1>

    <a href="/dataMaster/dataProyek" class="btn btn-info mt-3">Kembali</a>

    <!-- Jumbotron -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-11">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#home" style="color: black;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#fasilitas" style="color: black;">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#brosur" style="color: black;">Brosur</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#pricelist" style="color: black;">Pricelist</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#foto" style="color: black;">Foto</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#video" style="color: black;">Video</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade show active">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div style="background-color: white; border:solid;">
                                        <p class="p-2"><?= $proyek['nama_proyek']; ?></p>
                                        <p class="p-2">
                                            <i class="fas fa-bed"></i>&nbsp;<?= $detail['kamar_tidur']; ?>
                                            <i class="fas fa-bath"></i>&nbsp;<?= $detail['kamar_mandi']; ?>
                                            <i class="fas fa-car"></i>&nbsp;<?= $detail['carport']; ?>
                                            <i class="fas fa-home"></i>&nbsp;<?= $detail['luas_bangunan']; ?>
                                            <i class="fas fa-th-large"></i>&nbsp;<?= $detail['luas_tanah']; ?>
                                        </p>
                                        <p class="p-2"><?= $detail['fasilitas']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center">Informasi Properti
                                    </p><br>
                                    <p><?= $detail['informasi_properti']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center">Deskripsi
                                    </p><br>
                                    <p><?= $detail['deskripsi']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div id="fasilitas" class="tab-pane fade">
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <p class="text-center"><i class="fa fa-plus-square"></i><br>Fasilitas Kesehatan</p><br>
                                    <p><?= $detail['fasilitas_kesehatan']; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-center"><i class="fa fa-graduation-cap"></i><br>Fasilitas Pendidikan</p><br>
                                    <p><?= $detail['fasilitas_pendidikan']; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-center"><i class="fa fa-shopping-cart"></i><br>Fasilitas Komersil</p><br>
                                    <p><?= $detail['fasilitas_komersil']; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-center"><i class="fa fa-map-signs"></i><br>Wisata & Hiburan</p><br>
                                    <p><?= $detail['wisata_hiburan']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div id="brosur" class="tab-pane fade">
                            <div class="row mt-3">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['brosur1']; ?>" alt="" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['brosur2']; ?>" alt="" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['brosur3']; ?>" alt="" style="max-width: 200px;">
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                        </div>
                        <div id="pricelist" class="tab-pane fade">
                            <div class="row mt-3">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-5">
                                    <embed type="application/pdf" src="/profile/<?= $tools['pricelist1']; ?>" width="300" height="300"></embed>
                                </div>
                                <div class="col-md-5">
                                    <embed type="application/pdf" src="/profile/<?= $tools['pricelist2']; ?>" width="300" height="300"></embed>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-6">
                                    <embed type="application/pdf" src="/profile/<?= $tools['pricelist3']; ?>" width="300" height="300"></embed>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                        <div id="foto" class="tab-pane fade">
                            <div class="row mt-3">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['featured']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto1']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto2']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto3']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto4']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto5']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto6']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto7']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto8']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-3">
                                    <img src="/profile/<?= $tools['foto9']; ?>" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                        </div>

                        <div id="video" class="tab-pane fade">
                            <div class="row mt-3">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="100%" height="500" class="embed-responsive-item" src="<?= $tools['video1']; ?>" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="100%" height="500" class="embed-responsive-item" src="<?= $tools['video2']; ?>" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="100%" height="500" class="embed-responsive-item" src="<?= $tools['video3']; ?>" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Jumbotron -->

</div>

<?= $this->endSection(); ?>