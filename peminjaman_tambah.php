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
    
    <h1 class="mt-4">Peminjaman Buku</h1>
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
                $tanggal_peminjaman = date('y-m-d');
                $tanggal_kembali = date('y-m-d',strtotime($tanggal_peminjaman.'+7 days'));
                $jumlah_peminjaman = $_POST['jumlah_pinjam'];
                $status_peminjaman = $_POST['status_peminjaman'];
                $query = mysqli_query($kon, "INSERT INTO peminjaman (bukuID,userID,tgl_peminjaman,tgl_pengembalian,jumlah_pinjam,statusPeminjaman) values('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_kembali',' $jumlah_peminjaman','$status_peminjaman')");
                
                if($query) {
                    echo '<script>alert("Tambah data berhasil.");window.location="peminjaman.php";</script>';
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
                <div class="col-md-2">Jumlah Dipinjam</div>
                <div class="col-md-8">
                    <input type="number" name="jumlah_pinjam" min="1" max="2" value="1">
                </div>
            </div>
            <div class="row">
            <div class="row mb-3">
                <div class="col-md-2">Status Peminjaman</div>
                <div class="col-md-8">
                    <select name="status_peminjaman" class="form-control">
                        <option value="dipinjam">Dipinjam</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn  btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn  btn-secondary">Reset</button>
                    <a href="?page=peminjaman" class= "btn btn-danger">Kembali</a>
                </form>           
            </div>
        </div>
</div>
</body>