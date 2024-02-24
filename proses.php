<?php
include "koneksi.php";

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];

$insert = mysqli_query($kon,"INSERT INTO buku VALUES('', '$judul', '$penulis', '$penerbit', '$tahun_terbit');");

if(!empty($insert)){
    echo '<script>
    alert("data anda sudah terdaftar");
    window.location="Daftarbuku.php";
    </script>';
}
?>