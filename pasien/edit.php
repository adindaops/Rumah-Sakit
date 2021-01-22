<?php
include_once('../header.php');
?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Edit Data Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                    $id = @$_GET['id'];
                    $pasien = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'") or die (mysqli_error($conn));
                    $data = mysqli_fetch_array($pasien);
                ?>

                
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas">No Identitas</label>
                        <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                        <input type="number" name="identitas" value="<?=$data['no_identitas']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" value="<?=$data['nama_pasien']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" value="L" required <?=$data['gender'] == "L" ? "checked" : null ?> >Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" <?=$data['gender'] == "P" ? "checked" : null ?>>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alt">Alamat</label>
                        <textarea name="alamat"  class="form-control" required><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input name="no_telp" value="<?=$data['no_telp']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="edit" value="simpan" class="btn btn-success">
                    
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../footer.php'); ?>