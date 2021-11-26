<?php 
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "perpus";
	
 
	$koneksi = mysqli_connect($host, $user, $password, $db);

	function query($query){
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];

		while( $row = mysqli_fetch_assoc($result) ){
			$rows[] = $row;
		}
	return $rows;
	}

	function tambah($data){
		global $koneksi;

		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$prodi = htmlspecialchars($data["prodi"]);
		$telepon = htmlspecialchars($data["telepon"]);

		$gambar = upload();
		if( !$gambar ){
			return false;
		}

		$query = "INSERT INTO anggota VALUES ('', '$nama', '$nim', '$prodi', '$telepon', '$gambar')";
		mysqli_query($koneksi,$query);

	return mysqli_affected_rows($koneksi);
	}


	function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		if( $error === 4 ){
			echo "<script>
					alert('Silahkan Masukkan Gambar !!');
				</script>";

			return false;
		}


		$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'pdf'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script>
					alert('Silahkan Upload Dalam Format Gambar Atau Pdf');
				</script>";

			return false;
		}


		if($ukuranFile > 900000){
			echo "<script>
					alert('Ukuran File Terlalu Besar');
				</script>";
		}

		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;


		move_uploaded_file($tmpName, 'imageweb/' . $namaFileBaru);

		return $namaFileBaru;
	}



	function hapus($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM anggota  WHERE id = $id");

	return mysqli_affected_rows($koneksi);
	}

	function ubah($data){
		global $koneksi;
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$prodi = htmlspecialchars($data["prodi"]);
		$telepon = htmlspecialchars($data["telepon"]);
		$gambar_old = htmlspecialchars($data["gambar_old"]);


		if( $_FILES['gambar']['error'] === 4 ){
			$gambar = $gambar_old;
		}
		else{
			$gambar = upload();
		}

		$query = "UPDATE anggota SET
					nama = '$nama',
					nim = '$nim',
					prodi = '$prodi',
					telepon = '$telepon',
					gambar = '$gambar'

					WHERE id = $id
					";

		mysqli_query($koneksi,$query);

	return mysqli_affected_rows($koneksi);
	}


?>