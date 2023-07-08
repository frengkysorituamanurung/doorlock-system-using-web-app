<div class="content-wrapper">
    <div class="row purchace-popup">
        <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Untuk Mengambil data, Silahkan lakukan Config dan singkronasi data terlebih dahulu</p>
                <a class="btn ml-auto download-button d-none d-md-block" href="../data_config/index.php" target="_blank">Konfigurasi</a>
                <a class="btn purchase-button mt-4 mt-md-0" href="../data_sync/index.php" target="_blank">Singkronisasi</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Mesin</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo totalr("data_device","");?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Tersedia <?php echo totalr("data_device","");?> device
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Fingerprint</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo totalr("data_sidik_jari","");?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Teregister <?php echo totalr("data_absensi","");?> Finger
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Absensi</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo totalr("data_absensi","");?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Terinput <?php echo totalr("data_absensi","");?> Absensi
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Pegawai</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo totalr("data_pegawai","");?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Terdaftar <?php echo totalr("data_pegawai","");?> pegawai
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 grid-margin stretch-card">
            <!--weather card-->
            <div class="card card-weather">
                <div class="card-body">
                    <div class="weather-date-location">
                        <h3><?php
                            $namaHari = array(
                                1 => "Senin",
                                2 => "Selasa",
                                3 => "Rabu",
                                4 => "Kamis",
                                5 => "Jumat",
                                6 => "Sabtu",
                                7 => "Minggu"
                            );

                            echo $namaHari[date('N')];

                            ?>
                        </h3>
                        <p class="text-gray">
                            <span class="weather-date"><?php echo format_indo(date('Y-m-d'));?></span>
                            <span class="weather-location">Indonesia</span>
                        </p>
                    </div>
                    <div class="weather-data d-flex">
                        <div class="mr-auto">
                            <h6 class="display-3">Absensi
                                </h6>
                            <p>
                                Fingerprint Multidevice
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!--weather card ends-->
        </div>
        <div class="col-lg-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-primary mb-5">Informasi Kantor</h2>
                    <div class="wrapper d-flex justify-content-between">
                        <div class="side-left">
                            <p class="mb-2">Jumlah Kantor</p>
                            <p class="display-4 mb-4 font-weight-light"><?php echo totalr("data_kantor","")?> Kantor</p>
                        </div>
                        <div class="side-right">
                            <small class="text-muted"><?php echo format_indo(date('Y-m-d'));?></small>
                        </div>
                    </div>
                    <div class="wrapper d-flex justify-content-between">
                        <div class="side-left">
                            <p class="mb-2">Jabatan</p>
                            <p class="display-4 mb-5 font-weight-light"><?php echo totalr("data_jabatan","")?> Jabatan</p>
                        </div>
                        <div class="side-right">
                            <small class="text-muted"><?php echo format_indo(date('Y-m-d'));?></small>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>