<?php
    include "koneksi.php";
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Green Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Green
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.php">Laporan Peminjaman</a></h1>

            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="index.php">kembali</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- End Header -->

    <?php
        $no = 1;
        if(isset($_POST['cari'])){
            $dari = mysqli_real_escape_string($kon,$_POST['dari']);
            $sampai = mysqli_real_escape_string($kon,$_POST['sampai']);
            $query=mysqli_query($kon,"SELECT * FROM peminjaman LEFT JOIN user on user.userID=peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID WHERE tgl_peminjaman BETWEEN '$dari' AND '$sampai'");
        }else {
            $query=mysqli_query($kon,"SELECT * FROM peminjaman LEFT JOIN user on user.userID=peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID");
        }
    ?>
    
    <!-- body -->
    <form action="" method="post">
        <table>
            <tr>
                <td>Dari Tanggal</td>
                <td>: <input type="date" name="dari" ></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>Sampai tanggal</td>
                <td>: <input type="date" name="sampai"></td>
            </tr>
            <tr>
                <td><input type="submit" value="SET" name="cari"></td>
            </tr>
        </table>
    </form>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="com-md-4">
                    <button onclick="cetak()" class="btn btn-success"><i class="bi bi-printer"></i> Cetak Data</button>
                        <table class="table table-bordered" id="dataTable" width="100%" cellpading="0">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
                            </tr>
                            <?php
                                while ($liat = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $liat['username']; ?></td>
                                <td><?php echo $liat['judul']; ?></td>
                                <td><?php echo $liat['tgl_peminjaman']; ?></td>
                                <td><?php echo $liat['tgl_pengembalian']; ?></td>
                                <td><?php echo $liat['statusPeminjaman']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
  function cetak () {
    window.print();
  }
</script>