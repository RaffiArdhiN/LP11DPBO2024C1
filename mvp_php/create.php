<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
$pp = new ProsesPasien();
if (isset($_POST['submit'])) {
    //memanggil add
    $pp->create($_POST);
}
else {
    $data = $tp->tampilCreate();
}