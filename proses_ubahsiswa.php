<?php
include "config/db.php";

$id 			= $_POST['id'];
$nama 			= $_POST['nama'];
$email 			= $_POST['email'];
$tahun_masuk 	= $_POST['tahun_masuk'];
$foto 			= $_FILES['foto']['name'];
$nama_foto		= date('dmYHis') . $foto;
$path 			= "images/" . $nama_foto;

if ($foto != "") {
	$ext_allow 	= array('png', 'jpg', 'jpeg', 'Jpeg');
	$x 			= explode('.', $foto);
	$ext 		= strtolower(end($x));
	$tmp 		= $_FILES['foto']['tmp_name'];

	if (in_array($ext, $ext_allow) === true) {
		if (move_uploaded_file($tmp, $path)) {

			$query = "UPDATE data_siswa SET nama_siswa='$nama', email='$email', tahun_masuk='$tahun_masuk', foto_siswa='$nama_foto' WHERE id_siswa='$id'";
			$result = mysqli_query($koneksi, $query);


			if (!$result) {
				die("Query gagal dijalankan" . mysqli_errno($koneksi));
			} else {
				echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
			}
		} else {
			echo "Maaf, Gambar gagal di upload";
			echo "<a href='index.php?pages=ubahsiswa'>Kembali</a>";
		}
	} else {
		echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='ubahdata_siswa.php';</script>";
	}
} else {
	$query = "UPDATE data_siswa SET nama_siswa='$nama', email='$email', tahun_masuk='$tahun_masuk' WHERE id_siswa='$id'";
	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		die("Query gagal dijalankan" . mysqli_errno($koneksi));
	} else {
		echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
	}
}