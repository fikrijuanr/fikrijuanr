<?php
 if (isset($_POST['proses'])) {
 $pertama = $_POST['pertama'];
 $kedua = $_POST['kedua'];
 $operasi = $_POST['operasi'];
  switch ($operasi) {
   case 'tambah':
    $hasil = $pertama + $kedua;
   break;
   case 'kurang':
    $hasil = $pertama - $kedua;
   break;
   case 'kali':
    $hasil = $pertama * $kedua;
   break;
   case 'bagi':
    $hasil = $pertama / $kedua;
   }
}