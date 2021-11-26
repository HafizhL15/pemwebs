<?php 

	require 'fungsi.php';


	$id = $_GET["id"];
	
	$perpus = query("SELECT * FROM anggota WHERE id = $id")[0];

	if(isset($_POST["submit"])){

		if ( ubah($_POST) > 0 ) {
			echo "
				<script>
					alert('Berhasil Diupdate');
					document.location.href = 'index.php';
				</script>
			";
		}
		else{
			echo "
				<script>
					alert('Gagal Diupdate');
					document.location.href = 'index.php';
				</script>
			";
		}

	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>UPDATE DATA</title>

    <!-- Icons font CSS-->
    <link href="Forms/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="Forms/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="Forms/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Forms/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="Forms/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Update Data Anggota Perpustakaan</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row row-space">
							<input type="hidden" name="id" value="<?= $perpus["id"]; ?>">
							<input type="hidden" name="gambarold" value="<?= $perpus["gambar"]; ?>">
                            <div class="col-2">
                                <div class="input-group">
								<label for="nama">Nama : </label>
								<input style="background-color: #B0C4DE;" type="text" name="nama" id="nama" required value="<?= $perpus["nama"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
								<label for="nim">NIM : </label>
								<input style="background-color: #B0C4DE;" type="text" name="nim" id="nim" required value="<?= $perpus["nim"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
								<label for="prodi">Prodi : </label>
								<input style="background-color: #B0C4DE;" type="text" name="prodi" id="prodi" required value="<?= $perpus["prodi"] ?>">
								</div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
								<label for="telepon">Nomor Telepon : </label>
								<input style="background-color: #B0C4DE;" type="text" name="telepon" id="telepon" required value="<?= $perpus["telepon"] ?>">
								</div>
                            </div>
                        </div>
                        <div class="input-group">
								<label for="gambar">Gambar : </label>
								<img src="imageweb/<?= $perpus['gambar']; ?>">
								<input type="file" name="gambar" id="gambar">                           
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="Forms/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="Forms/vendor/select2/select2.min.js"></script>
    <script src="Forms/vendor/datepicker/moment.min.js"></script>
    <script src="Forms/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="Forms/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>