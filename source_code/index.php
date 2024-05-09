<!-- Saya Revana Faliha Salma NIM 2202869 mengerjakan Soal LP11
dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan 
kecurangan seperti yang telah dispesifikasikan. Aamiin. -->

<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("presenter/ProsesPasien.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();
$prosespasien = new ProsesPasien();

// Memeriksa apakah form telah disubmit
if (isset($_POST['add'])) {
    $data = $_POST;

    $prosespasien->tambahDataPasien($data);

    header("location: index.php"); 

}else if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $data = $_POST;

    $prosespasien->editDataPasien($id, $data);

    header("location: index.php");

}else if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $prosespasien->hapusDataPasien($id);

    header("location: index.php");
}

$data = $tp->tampil();