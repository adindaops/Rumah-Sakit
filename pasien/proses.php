<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString(); 
    $identitas= trim(mysqli_real_escape_string($conn, $_POST['identitas']));
    $nama= trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $jk= trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $alt= trim(mysqli_real_escape_string($conn, $_POST['alamat']));
    $telp= trim(mysqli_real_escape_string($conn, $_POST['no_telp']));
    $cek_identitas = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE no_identitas ='$identitas'");
    if(mysqli_num_rows($cek_identitas)>0){
        echo "<script>alert('Nomor identitas sudah ada. Silahkan inputkan nomor identitas dengan benar!'); window.location='add.php';</script>";
    }else{
        mysqli_query($conn, "INSERT INTO tb_pasien (id_pasien,no_identitas, nama_pasien, gender, alamat, no_telp) 
                        VALUES ('$uuid','$identitas','$nama','$jk','$alt','$telp')") or die (mysqli_error($conn));
        echo "<script>window.location='data.php';</script>";
    }
    

}elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $uuid = Uuid::uuid4()->toString(); 
    $identitas= trim(mysqli_real_escape_string($conn, $_POST['identitas']));
    $nama= trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $jk= trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $alt= trim(mysqli_real_escape_string($conn, $_POST['alamat']));
    $telp= trim(mysqli_real_escape_string($conn, $_POST['no_telp']));
    mysqli_query($conn, "UPDATE tb_pasien SET no_identitas = '$identitas',
                        nama_pasien = '$nama', gender = '$jk', alamat = '$alt', no_telp = '$telp'
                        WHERE id_pasien = '$id' ") or die (mysqli_error($conn));
    echo "<script>window.location='data.php';</script>";

}
?>