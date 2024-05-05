<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
$pp = new ProsesPasien();
if (isset($_POST['submit'])) {
  // Memanggil fungsi update dengan data dari $_POST
  $pp->update($_POST);
} else {
  $id = $_GET['id'];
    $data = $tp->tampilEdit($id);
}