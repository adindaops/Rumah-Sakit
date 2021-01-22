<?php
include_once('../header.php');
?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Tambah Data Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">No. Identitas</label>
                        <input type="number" name="identitas" id="identitas" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required>Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P">Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <textarea name="alamat" id="alt" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">No. Telepon</label>
                        <input name="no.telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../footer.php'); ?>