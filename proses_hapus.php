<?php
include "config/db.php";

$id_siswa = $_GET['id_siswa'];

$sql = $pdo->prepare("SELECT foto_siswa FROM data_siswa WHERE id_siswa=:id_siswa");
$sql->bindParam(':id_siswa', $id_siswa);
$sql->execute();
$data = $sql->fetch();

if ($data['foto_siswa'] == "default.png") {
	$sql = $pdo->prepare("DELETE FROM data_siswa WHERE id_siswa=:id_siswa");
	$sql->bindParam(':id_siswa', $id_siswa);
	$execute = $sql->execute();

	if ($execute) {
		header("location: index.php");
	} else {
		echo "Data gagal dihapus! <a href='index.php>Kembali</a>";
	}
} else {
	if (is_file("images/" . $data['foto_siswa'])) {
		unlink("images/" . $data['foto_siswa']);
	}
	$sql = $pdo->prepare("DELETE FROM data_siswa WHERE id_siswa=:id_siswa");
	$sql->bindParam(':id_siswa', $id_siswa);
	$execute = $sql->execute();

	if ($execute) {
		header("location: index.php");
	} else {
		echo "Data gagal dihapus! <a href='index.php>Kembali</a>";
	}
}
