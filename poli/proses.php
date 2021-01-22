<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if (isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i=1; $i <= $total ; $i++) { 
        $uuid = Uuid::uuid4()->toString(); 
        $nama= trim(mysqli_real_escape_string($conn, $_POST['nama-'.$i]));
        $gedung= trim(mysqli_real_escape_string($conn, $_POST['gedung-'.$i]));
        $sql = mysqli_query($conn, "INSERT INTO tb_poli (id_poli, nama_poli, gedung) VALUES ('$uuid','$nama','$gedung')") or die (mysqli_error($conn));
    }
    if ($sql) {
        echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php';</script>";
    }else {
        echo "<script>alert('Gagal tambah data, coba lagi'); window.location='generate.php';</script>";
    }

}elseif (isset($_POST['edit'])) {
    $total = $_POST['total'];
    for ($i=0; $i < count($_POST['id']) ; $i++) { 
        $id= $_POST['id'][$i];
        $nama= $_POST['nama'][$i];
        $gedung= $_POST['gedung'][$i];
        $sql = mysqli_query($conn, "UPDATE tb_poli SET nama_poli ='$nama', gedung='$gedung' WHERE id_poli='$id'") or die (mysqli_error($conn));
    }
    echo "<script>alert('".$total." Data berhasil di update'); window.location='data.php';</script>";

}
?>