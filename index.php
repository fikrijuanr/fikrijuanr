<!doctype html>
<html lang="en">

<head>
	<title>Beranda | Data</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	body {
		background: url("images/2.jpg");
		background-repeat: no-repeat;
	}
</style>

<body>
	<div class="container mt-5">
		<div class="justify-content-center">
			<div class="card-header text-white bg-secondary">

				<div class="card-title text-center">
					<a href="index.php?pages=beranda" class="text-black-50"><button type="button" class="btn btn-outline-dark"><b>Beranda </button></a>
					<a href="index.php?pages=tambahsiswa" class="text-black-50"><button type="button" class="btn btn-outline-dark">Tambah Mahasiswa </b></button></a></div>
			</div>
			<div class="card-body bg-dark text-white" style="border-radius:3px">
				<?php
				if (isset($_GET['pages'])) {
					$pages = $_GET['pages'];

					switch ($pages) {
						case 'beranda':
							include "pages/beranda.php";
							break;
						case 'tambahsiswa':
							include "pages/tambah_siswa.php";
							break;

						case 'editsiswa':
							include "pages/ubahdata_siswa.php";
							break;

						default:
							echo "Halaman tidak Ditemukan!";
							break;
					}
				} else {
					include "pages/beranda.php";
				}
				?>
			</div>
		</div>
		<div class="card-footer text-center justify-conten-center">
			Created by Muhammad Fikri Juan Ramadhan - 10118317
		</div>
	</div>
</body>

</html>