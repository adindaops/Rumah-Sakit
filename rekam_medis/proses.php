<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString(); 
    $pasien= trim(mysqli_real_escape_string($conn, $_POST['pasien']));
    $dokter= trim(mysqli_real_escape_string($conn, $_POST['dokter']));
    $keluhan= trim(mysqli_real_escape_string($conn, $_POST['keluhan']));
    $diagnosa= trim(mysqli_real_escape_string($conn, $_POST['diagnosa']));
    $poli= trim(mysqli_real_escape_string($conn, $_POST['poli']));
    
    $tanggal= trim(mysqli_real_escape_string($conn, $_POST['tgl']));
    mysqli_query($conn, "INSERT INTO tb_rm (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa ) 
    VALUES ('$uuid','$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tanggal')") or die (mysqli_error($conn));
    $obat= $_POST['obat'];
    foreach ($obat as $ob) {
        mysqli_query($conn, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$uuid', '$ob')") or die (mysqli_error($conn));
    }
    
    echo "<script>window.location='data.php';</script>";
}
?>