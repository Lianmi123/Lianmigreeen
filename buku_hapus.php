<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($kon, "DELETE FROM buku WHERE bukuID=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href = "buku.php?page=buku";
</script>