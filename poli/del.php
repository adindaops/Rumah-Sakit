<?php
require_once "../config/config.php";

$chk=$_GET['id'];
$chk = explode(',',$chk);

if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php';</script>";
}else {
    foreach ($chk as $id) {
        $sql = mysqli_query($conn,"DELETE FROM tb_poli WHERE id_poli = '$id' ") or die (mysqli_error($conn));
    }
    if ($sql) {
        echo "<script>alert('".count($chk)." data berhasil dihapus'); window.location='data.php';</script>";
    }else {
        echo "<script>alert('Gagal hapus data, coba lagi');</script>";
    }
}
?>