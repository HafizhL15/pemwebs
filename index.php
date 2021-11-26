<?php  
	//koneksi ke database
	require 'fungsi.php';
	$anggota_perpus = query("SELECT * FROM anggota ORDER BY id ASC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>DATA PERPUSTAKAAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Home//icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Home/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Home/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/css/util.css">
	<link rel="stylesheet" type="text/css" href="Home/css/main.css">
<!--===============================================================================================-->
	
</head>
<body style="color: white !important;">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Home/images/bg-01.jpg');">
			<div class="login100-form-title">
				<h1>Daftar Anggota Perpustakaan</h1>
			</div>
			<div class="container-login100-form-btn">
				<a href="tambah.php" class="btn btn-primary btn-sm active" role="button">Tambah Data Anggota</a>
			</div>
			<br><br><br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Nama</th>
						<th scope="col">NIM</th>
						<th scope="col">Prodi</th>
						<th scope="col">Telepon</th>
						<th scope="col">Gambar</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>

				<tbody>
				<?php $i = 1; ?>
				<?php foreach ( $anggota_perpus as $row ):?>

				<tr>
					<td><?= $i; ?></td>
					<td><?= $row["nama"]; ?></td>
					<td><?= $row["nim"]; ?></td>
					<td><?= $row["prodi"]; ?></td>
					<td><?= $row["telepon"]; ?></td>
					<td><img src="imageweb/<?= $row["gambar"]; ?>" width="100"></td>
					<td>
						<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-success btn-sm active" role="button">Ubah</a>
						<a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm active" role="button" onclick="return confirm('Apakah Anda Ingin Menghapus Data Tersebut? ')">Hapus</a>
					</td>
				</tr>
				
				<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
			</table>			
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="Home/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Home/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Home/vendor/bootstrap/js/popper.js"></script>
	<script src="Home/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Home/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src=Home/"vendor/daterangepicker/moment.min.js"></script>
	<script src=Home/"vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Home/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Home/js/main.js"></script>

</body>
</html>