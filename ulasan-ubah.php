<?php
include "koneksi.php";
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

            <h1 class="logo me-auto"><a href="index.php">Ulasan Buku</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="index.php">Kembali</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        $id = $_GET['id'];
                        if (isset($_POST['submit'])) {
                            $id_buku = $_POST['id_buku'];
                            $id_user = $_SESSION['user']['userID'];
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];
                            $query = mysqli_query($kon, "UPDATE ulasanbuku SET bukuID='$id_buku', ulasan='$ulasan', rating='$rating' WHERE ulasanID=$id");
                            if ($query) {
                                echo '<script>alert("Ubah data berhasil.");window.location="ulasan.php";</script>';
                            } else {
                                echo '<script>alert("Ubah data gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($kon, "SELECT*FROM ulasanbuku WHERE ulasanID=$id");
                        $data = mysqli_fetch_array($query);

                        ?>
                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <select name="id_buku" class="form-control">
                                    <?php
                                    $buk = mysqli_query($kon, "SELECT*FROM buku");
                                    while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                        <option <?php if ($data['bukuID'] == $buku['bukuID']) echo 'selected'; ?> value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Ulasan</div>
                            <div class="col-md-8">
                                <textarea name="ulasan" rows="5" class="form-control"><?php echo $data['ulasan']; ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Rating</div>
                            <div class="col-md-8">
                                <select name="rating" class="form-control">
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                    ?>
                                        <option <?php if ($data['rating'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn  btn-primary" name="submit" value="submit">Simpan</button>
                                <button type="reset" class="btn  btn-secondary">Reset</button>
                                <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
</body>