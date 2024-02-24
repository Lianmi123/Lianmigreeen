<?php
include "koneksi.php";

// Pastikan ulasanID tersedia di query string
if(isset($_GET['ulasanID'])) {
    $id = $_GET['ulasanID'];

    // Persiapkan pernyataan SQL untuk menghapus ulasan dengan menggunakan prepared statement
    $query = mysqli_prepare($kon, "DELETE FROM ulasanbuku WHERE ulasanID = ?");
    
    // Bind parameter ulasanID ke pernyataan SQL
    mysqli_stmt_bind_param($query, 'i', $id);

    // Eksekusi pernyataan
    if(mysqli_stmt_execute($query)) {
        // Jika penghapusan berhasil, arahkan pengguna kembali ke halaman ulasan
        echo '<script>alert("Hapus data berhasil"); location.href="ulasan.php";</script>';
        exit; // Keluar dari skrip setelah penghapusan berhasil
    } else {
        // Jika terjadi kesalahan dalam eksekusi pernyataan, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($kon);
    }

    // Tutup pernyataan
    mysqli_stmt_close($query);
} else {
    // Jika ulasanID tidak tersedia di query string, tampilkan pesan kesalahan
    echo "Error: Ulasan ID tidak tersedia";
}
?>
