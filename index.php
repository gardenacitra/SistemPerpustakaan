<?php
    $koneksi = new mysqli("localhost","root","","db_perpus");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PERPUSTAKAAN</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="assets/css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body>
        <div id="wrapper">
            <!-- NAV TOP BAR -->
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">PESPUSTAKAAN</a> 
                </div>
                <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> <?php echo date('d F Y'); ?> &nbsp; 
                    <a href="logout.php" class="btn btn-danger square-btn-adjust"> Logout </a> 
                </div>
            </nav>  
            <!-- /NAV TOP BAR/  -->

            <!-- NAV SIDE BAR ADMIN -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                        </li>
                        <li>
                            <a class="active-menu"  href="index.php"><i class="fa fa-home fa-2x"></i> Dashboard </a>
                        </li>
                        <li>
                            <a  href="?page=pengguna&aksi="><i class="fa fa-user fa-2x"></i> Data Pengguna </a>
                        </li>
                        <li>
                            <a  href="?page=anggota&aksi="><i class="fa fa-user fa-2x"></i> Data Anggota </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square fa-2x"></i> Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=buku&aksi="><span class="fa fa-book"></span>  Data Buku </a>
                                </li>
                                <li>
                                    <a href="?page=lokasi&aksi="><span class="fa fa-list"></span>  Rak </a>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-exchange fa-2x"></i> Transaksi <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=transaksi&aksi="><span class="fa fa-upload"></span>  Peminjaman </a>
                                </li>
                                <li>
                                    <a href="?page=pengembalian&aksi="><span class="fa fa-download"></span>  Pengembalian </a>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-2x"></i> Laporan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="?page=buku&aksi=cetak"></i><span class="fa fa-book"></span> Laporan Buku </a></li>
                                <li><a href="?page=anggota&aksi=cetak"></i><span class="fa fa-user"></span> Laporan Anggota </a></li>
                                <li><a href="?page=transaksi&aksi=cetak"></i><span class="fa fa-exchange"></span> Laporan Transaksi </a></li>
                            </ul>
                        </li>                      
                    </ul>
                </div>
            </nav>  

            <!-- /NAV SIDE BAR ADMIN/  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <?php

                                $page = '';
                                if(isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = '';
                                }

                                $aksi = '';
                                if(isset($_GET['aksi'])) {
                                    $aksi = $_GET['aksi'];
                                } else {
                                    $aksi = '';
                                }

                                if ($page == "buku") {
                                    if ($aksi == "" || $aksi == "cancel") {
                                        include "page/buku/buku.php";
                                    }elseif ($aksi== "tambah") {
                                        include "page/buku/tambah.php";
                                    }elseif ($aksi== "ubah") {
                                        include "page/buku/ubah.php";
                                    }elseif ($aksi== "hapus") {
                                        include "page/buku/hapus.php";
                                    }elseif ($aksi== "cetak") {
                                        include "page/buku/form_laporan_buku.php";
                                    }
                                }elseif ($page == "lokasi" ) {
                                    if ($aksi == "" || $aksi == "cancel") {
                                        include "page/lokasi/lokasi.php";
                                    }elseif ($aksi == "tambah") {
                                        include "page/lokasi/tambah.php";
                                    }elseif ($aksi == "ubah") {
                                        include "page/lokasi/ubah.php";
                                    }elseif ($aksi == "hapus") {
                                        include "page/lokasi/hapus.php";
                                    }
                                }elseif ($page == "anggota" ) {
                                    if ($aksi == "" || $aksi == "cancel") {
                                        include "page/anggota/anggota.php";
                                    }elseif ($aksi == "tambah") {
                                        include "page/anggota/tambah.php";
                                    }elseif ($aksi == "ubah") {
                                        include "page/anggota/ubah.php";
                                    }elseif ($aksi == "hapus") {
                                        include "page/anggota/hapus.php";
                                    }elseif ($aksi== "cetak") {
                                        include "page/anggota/form_laporan_anggota.php";
                                    }
                                }elseif ($page == "transaksi" ) {
                                    if ($aksi == "" || $aksi == "cancel") {
                                        include "page/transaksi/transaksi.php";
                                    }elseif ($aksi == "tambah") {
                                        include "page/transaksi/tambah.php";
                                    }elseif ($aksi == "kembali") {
                                        include "page/transaksi/kembali.php";
                                    }elseif ($aksi == "perpanjang") {
                                        include "page/transaksi/perpanjang.php";
                                    }elseif ($aksi== "cetak") {
                                        include "page/transaksi/form_laporan_transaksi.php";
                                    }
                                }elseif ($page == "pengembalian" ) {
                                    if ($aksi == "") {
                                        include "page/transaksi/pengembalian.php";
                                    }elseif ($aksi == "tambah") {
                                        include "page/transaksi/tambah.php";
                                    }elseif ($aksi == "kembali") {
                                        include "page/transaksi/kembali.php";
                                    }elseif ($aksi == "perpanjang") {
                                        include "page/transaksi/perpanjang.php";
                                    }elseif ($aksi== "cetak") {
                                        include "page/transaksi/form_laporan_transaksi.php";
                                    }
                                }elseif ($page == "pengguna" ) {
                                    if ($aksi == "" || $aksi == "cancel") {
                                        include "page/pengguna/pengguna.php";
                                    }elseif ($aksi == "tambah") {
                                        include "page/pengguna/tambah.php";
                                    }elseif ($aksi == "ubah") {
                                        include "page/pengguna/ubah.php";
                                    }elseif ($aksi == "hapus") {
                                        include "page/pengguna/hapus.php";
                                    }
                                }elseif ($page == "") {
                                    include "home.php";
                                }
                            ?>

                        </div>
                    </div>                                  
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.metisMenu.js"></script>

        <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="assets/js/morris/morris.js"></script>

        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable();
                });
        </script>

        <script src="assets/js/custom.js"></script>
        
    </body>
</html>
