<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
    <link rel="stylesheet" href="new.css">
</head>
<body>
<i><h1 align="center">Tambah Buku</h1></i>
        
        <div class="container">
        <table align="center">
               <form action="proses.php" method="post">
       <tr>
            <td>Judul</td>
            <td>
                <input type="text" name="judul" required>
            </td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td>
                <input type="text" name="penulis" required>
            </td>
        </tr>
        <td>Penerbit</td>
            <td>
                <input type="text" name="penerbit" required>
            </td>
        </tr>
        </tr>
        <td>Tahun_Terbit</td>
            <td>
                <input type="date" name="tahun_terbit" required>
            </td>
        </tr>        
            <td colspan="2">
                <input type="submit" value="Daftar" required>
            </td>
        </tr> 
        </table>
    </div>
</body>
</html>