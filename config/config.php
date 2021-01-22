<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

include_once "conn.php";

//koneksi db
$conn = mysqli_connect('localhost','root','','db_rumahsakit');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

//fungsi base_url
function base_url($url = null){
    $base_url = "http://localhost/rumahsakit";
    if($url != null){
        return $base_url."/".$url;
    }else{
        return $base_url;
    }
}
?>