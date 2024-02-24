<?php
$id = $_GET['id'];
$query = mysqli_query($kon,"DELETE FROM peminjaman WHERE peminjamanID=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href= "status.php?page=peminjaman";
</script>