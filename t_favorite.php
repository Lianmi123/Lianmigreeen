<?php
session_start(); // Penting untuk memulai session sebelum mengakses $_SESSION

include "koneksi.php";

if (isset($_GET['bukuID'])) {
    $buku = $_GET['bukuID'];

    // Gunakan parameterized query untuk mencegah SQL injection
    $query = mysqli_prepare($kon, "SELECT * FROM buku WHERE bukuID=?");
    mysqli_stmt_bind_param($query, "s", $buku);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $urut = mysqli_fetch_array($result);

    if ($urut) { 
        // Menggunakan prepared statement untuk mencegah SQL injection
        $id = $_SESSION['user']['userID'];
        $bukuID = $urut['bukuID'];
        $insert_query = mysqli_prepare($kon, "INSERT INTO koleksipribadi (userID, bukuID) VALUES (?, ?)");
        mysqli_stmt_bind_param($insert_query, "ss", $id, $bukuID);
        mysqli_stmt_execute($insert_query);
        header('location: favorite.php');
        exit; // Penting untuk menghentikan eksekusi setelah melakukan redirect
    } 
}
?>