<?php
    require_once "../config/config.php";

    mysqli_query($conn, "DELETE FROM tb_dokter WHERE id_dokter = '$_GET[id]'") or die (mysqli_error($conn));
    echo "<script>window.location='data.php'</script>";

?>