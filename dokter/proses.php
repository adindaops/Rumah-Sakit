<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString(); 
    $nama= trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $spe= trim(mysqli_real_escape_string($conn, $_POST['spesialis']));
    $alt= trim(mysqli_real_escape_string($conn, $_POST['alamat']));
    $telp= trim(mysqli_real_escape_string($conn, $_POST['no_telp']));
    mysqli_query($conn, "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialis, alamat, no_telp) 
                        VALUES ('$uuid','$nama','$spe','$alt','$telp')") or die (mysqli_error($conn));
    echo "<script>window.location='data.php';</script>";


}elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama= trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $spe= trim(mysqli_real_escape_string($conn, $_POST['spe']));
    $alt= trim(mysqli_real_escape_string($conn, $_POST['alt']));
    $telp= trim(mysqli_real_escape_string($conn, $_POST['telp']));
    mysqli_query($conn, "UPDATE tb_dokter SET nama_dokter = '$nama', spesialis ='$spe', 
                        alamat = '$alt', no_telp = '$telp' 
                        WHERE id_dokter = '$id'") or die (mysqli_error($conn));
    echo "<script>window.location='data.php';</script>";

}
?>