<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/tambahan.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<label class="login100-form-title-1">
						Register
					</label>
				</div>
				<?php
				if (isset($_POST['register'])) {
					$nama = $_POST['nama_lengkap'];
					$telp = $_POST['telp'];
					$alamat = $_POST['alamat'];
					$email = $_POST['email'];
					$username = $_POST['username'];
					$password = md5($_POST['password']);
					$level = $_POST['level'];

					$insert = mysqli_query($kon, "INSERT INTO user (namaLengkap,telp,alamat,email,username,password,level) VALUES ('$nama','$telp','$alamat','$email','$username','$password','$level') ");

					if ($insert) {
						echo '<script>alert("Data Anda Berhasil Masuk ");location.href="login.php"</script>';
					} else {
						echo '<script>alert("Data Anda Gagal masuk, Mohon Coba Lagi");location.href="login.php"</script>';
					}
				}
				?>
				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<label class="label-input100">Nama Lengkap</label>
						<input class="input100" type="text" name="nama_lengkap" placeholder="Enter nama lengkap">
						<label class="focus-input100"></label>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<label class="label-input100">No Telepon</label>
						<input class="input100" type="text" name="telp" placeholder="Enter nama lengkap">
						<label class="focus-input100"></label>
					</div>
					
					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<label class="label-input100">Alamat</label>
						<input class="input100" type="text" name="alamat" placeholder="Enter alamat">
						<label class="focus-input100"></label>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<label class="label-input100">Email</label>
						<input class="input100" type="email" name="email" placeholder="Enter email">
						<label class="focus-input100"></label>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<label class="label-input100">Username</label>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<label class="focus-input100"></label>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<label class="label-input100">Password</label>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<label class="focus-input100"></label>
					</div>


					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<label class="label-input100">Level</label>
						<select class="input100" name="level">
							<option value="anggota">Anggota</option>
						</select>
						<label class="focus-input100"></label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="register">
							Create
						</button>
						<button class="back-form-btn" href="login.php">
							Back
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>

</body>

</html>