<?php
    require_once "../config/config.php";

    mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'") or die (mysqli_error($conn));
    echo "<script>window.location='data.php'</script>";

?>