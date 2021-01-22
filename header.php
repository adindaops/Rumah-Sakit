<?php
require_once "config/config.php";
require "assets/libs/vendor/autoload.php";

if(!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('dashboard')."';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rumah Sakit Kita</title>


    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/simple-sidebar.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/libs/DataTables/datatables.min.css');?>" rel="stylesheet">


</head>
<body>
    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/libs/DataTables/datatables.min.js')?>"></script>
    <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#"><span class="text-primary"><b>Rumah Sakit Kita</b></span></a>
            </li>
            <li>
                <a href="<?=base_url('dashboard')?>">Dashboard</a>
            </li>
            <li>
                <a href="<?=base_url('pasien/data.php')?>">Data Pasien</a>
            </li>
            <li>
                <a href="<?=base_url('dokter/data.php')?>">Data Dokter</a>
            </li>
            <li>
                <a href="<?=base_url('poli/data.php')?>">Data Poliklinik</a>
            </li>
            <li>
                <a href="<?=base_url('obat/data.php')?>">Data Obat</a>
            </li>
            <li>
                <a href="<?=base_url('rekam_medis/data.php')?>">Rekam Medis</a>
            </li>
            <li>
                <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</a>
            </li>
        </ul>
    </div>


<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
