<!-- Saya Revana Faliha Salma NIM 2202869 mengerjakan Soal LP11
dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan 
kecurangan seperti yang telah dispesifikasikan. Aamiin. -->

<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("view/EditPasien.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");

$tp = new EditPasien();
$data = $tp->edit($_GET['id']);
