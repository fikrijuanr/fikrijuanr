<?php
include "config/db.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$tahun_masuk = $_POST['tahun_masuk'];
$foto = $_FILES['foto_siswa']['name'];
$tmp = $_FILES['foto_siswa']['tmp_name'];

if (!empty($foto)) {
	$fotobaru = date('dmYHis') . $foto;

	$path = "images/" . $fotobaru;
	$ext_allow = array('png', 'jpg', 'jpeg', 'Jpeg');
	$x = explode('.', $foto);
	$ext = strtolower(end($x));

	if (in_array($ext, $ext_allow) === true) {
		if (move_uploaded_file($tmp, $path)) {

			$sql = $pdo->prepare("INSERT INTO data_siswa(nama_siswa, email, tahun_masuk, foto_siswa) VALUES(:nama,:email,:tahun_masuk,:fotobaru)");
			$sql->bindParam(':nama', $nama);
			$sql->bindParam(':email', $email);
			$sql->bindParam(':tahun_masuk', $tahun_masuk);
			$sql->bindParam(':fotobaru', $fotobaru);
			$sql->execute();

			if ($sql) {
				header('location:index.php');
			} else {
				echo "Maaf, Terjadi kesalahan saat menyimpan data";
				echo "<a href='index.php?pages=tambahsiswa'>Kembali</a>";
			}
		} else {
			echo "Maaf, Gambar gagal di upload";
			echo "<a href='index.php?pages=tambahsiswa'>Kembali</a>";
		}
	} else {
		echo "File Ekstensi tidak Support! Hanya .jpg dan .png";
		echo "<a href='index.php?pages=tambahsiswa'>Kembali</a>";
	}
} else {
	$fotobaru = "default.png";

	$sql = $pdo->prepare("INSERT INTO data_siswa(nama_siswa, email, tahun_masuk, foto_siswa) VALUES(:nama,:email,:tahun_masuk,:fotobaru)");
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':email', $email);
	$sql->bindParam(':tahun_masuk', $tahun_masuk);
	$sql->bindParam(':fotobaru', $fotobaru);
	$sql->execute();

	if ($sql) {
		header('location:index.php');
	} else {
		echo "Maaf, Terjadi kesalahan saat menyimpan data";
		echo "<a href='index.php?pages=tambahsiswa'>Kembali</a>";
	}
}
