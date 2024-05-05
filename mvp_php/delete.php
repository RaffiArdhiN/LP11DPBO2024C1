<?php
include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$prosespasien = new ProsesPasien(); // Ganti $pasien menjadi $prosespasien

// Cek apakah form telah di-submit
if (isset($_GET['id'])) {
  // Memanggil fungsi delete dengan data dari $_GET
  $prosespasien->delete($_GET['id']); // Ganti $pasien menjadi $prosespasien
  // header("location: index.php");
  // exit();
} 
