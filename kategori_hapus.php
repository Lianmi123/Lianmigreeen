<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($kon,"DELETE FROM kategoribuku WHERE kategoriID=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href= "kategori.php?page=kategori";
</script>