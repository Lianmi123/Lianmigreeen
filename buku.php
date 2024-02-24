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

 <!-- ======= Header ======= -->
 <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Buku</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="index.php">kembali</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<body>
<div class="card">
<div class="card-body">   
<div class="row">
    <div class="col-md-12">
        <a href="buku_tambah.php" class="btn btn-success">+ Tambah Data</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0%">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Kategori</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($kon,"SELECT * FROM buku LEFT JOIN kategoribuku on buku.kategoriID = kategoribuku.kategoriID");
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="assets/img/foto/<?php echo $data['foto']; ?>" width="100px" height="140px"></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['penulis']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahunTerbit']; ?></td>
                <td><?php echo $data['sinopsis']; ?></td>
        <td>
        <a class="btn btn-info" href="buku_ubah.php?id=<?php echo $data['bukuID'];?>">Ubah</a>
        <a onclick="return confirm('Apakah anda yakin ingin mengahapus buku ini?');" href="buku_hapus.php?id=<?php echo $data['bukuID'];?>" class="btn btn-danger">Hapus</a>
        </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
</div>
</body>