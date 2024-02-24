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

<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            include "koneksi.php";
            if(isset($_POST['submit'])) {
                $id_buku = $_POST['id_buku'];
                $id_user = $_SESSION['user']['userID'];
                $ulasan = $_POST['ulasan'];
                $rating = $_POST['rating'];
                $query = mysqli_query($kon, "INSERT INTO ulasanbuku (bukuID,userID,ulasan,rating) values('$id_buku','$id_user','$ulasan','$rating')");

                if($query) {
                    echo '<script>alert("Tambah data berhasil.");window.location="ulasan.php";</script>';
                }else{
                    echo '<script>alert("Tambah data gagal.");</script>';
                }
            }
            ?>
            <div class="row mb-3">
            <div class="col-md-2">Buku</div>
                <div class="col-md-8">
                    <select name="id_buku" class="form-control">
                        <?php
                            $buk = mysqli_query($kon,"SELECT*FROM buku");
                            while($buku = mysqli_fetch_array($buk)){
                        ?>
                                <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Ulasan :</div>
                <div class="col-md-8">
                <textarea name="ulasan" rows="5" class="form-control"></textarea> 
            </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Rating</div>
                <div class="col-md-8">
                <select name="rating">
                    <option>1</option>
                    <option>2</option> 
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
            </select>
            </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
            <button type="submit" class="btn  btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn  btn-secondary">Reset</button>
            <a href="?page=buku" class= "btn btn-danger">Kembali</a>
</form>           
</div>
</div>
</div>