<?php include_once('../header.php');?>

        <div class="box">
            <h1>Pasien</h1>
            <h4>
                <small>Data Pasien</small>
                <div class="pull-right">
                    <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
                </div>
            </h4>
            <form action="post" name="proses">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="pasien">
                        <thead >
                            <tr>
                                <th class="text-center">No Identitas</th>
                                <th class="text-center">Nama Pasien</th>
                                <th class="text-center">Jenis kelamin</th>
                                <th class="text-center">Alamat</th>                                
                                <th class="text-center">No. Telepon</th>
                                <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pasien = mysqli_query($conn, "SELECT * FROM tb_pasien") or die (mysqli_error($conn));
                        if (mysqli_num_rows($pasien) > 0) {
                            while ($data = mysqli_fetch_array($pasien)) { ?>
                                <tr>
                                    <td align="center"><?=$data['no_identitas']?></td>
                                    <td><?=$data['nama_pasien']?></td>
                                    <td align="center"><?=$data['gender']?></td>
                                    <td><?=$data['alamat']?></td>
                                    <td align="center"><?=$data['no_telp']?></td>
                                    <td align="center">
                                        <a href="edit.php?id=<?=$data['id_pasien']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="del.php?id=<?=$data['id_pasien']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>                                    
                                </tr>
                            <?php
                            }
                                
                        }else {
                            echo "<tr><td colspan=\"7\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <script>
                $(document).ready(function(){
                    $('#pasien').DataTable({
                        columnDefs: [
                            {
                                "orderable":false,
                                "targets": [0,5],
                                
                            }
                        ],
                        "order": [2,"asc"],
                        
                    });
                });
            </script>


           
        </div>
        

<?php include_once('../footer.php');?>