<?php 

$chk=$_GET['id'];
$chk = explode(',',$chk);

if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php';</script>";
}else {
    include_once('../header.php');?>
        <div class="box">
                <h1>Poliklinik</h1>
                <h4>
                    <small>Edit Data Poliklinik</small>
                    <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="proses.php" method="post">
                            <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                            <table class="table">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Poliklinik</th>
                                    <th class="text-center">Gedung</th>
                                </tr>
                                <?php
                                $no = 1;
                                for ($i=0; $i < count($chk); $i++) {        
                                    $id = $chk[$i];                       
                                    $sql_poli = mysqli_query($conn, "SELECT * FROM tb_poli WHERE id_poli = '$id'") or die(mysqli_error($conn));
                                    while($data = mysqli_fetch_array($sql_poli)){ ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td>
                                            <input type="hidden" name="id[]" value="<?=$data['id_poli']?>">
                                            <input type="text" name="nama[]" value="<?=$data['nama_poli']?>" class="form-control" requiered>
                                        </td>
                                        <td>
                                            <input type="text" name="gedung[]" value="<?=$data['gedung']?>" class="form-control" requiered>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </table>
                            <div class="form-group pull-right">
                                <input type="submit" name="edit" id="Simpan Semua" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
        </div>

    <?php include_once('../footer.php'); 

}?>

