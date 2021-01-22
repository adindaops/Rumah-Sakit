<?php include_once('../header.php');?>

        <div class="box">
            <h1>Rekam Medis</h1>
            <h4>
                <small>Data Rekam Medis</small>
                <div class="pull-right">
                    <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Rekam Medis</a>
                </div>
            </h4>
            
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="rekam_medis" >
                        <thead >
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Tanggal Periksa</th>
                                <th class="text-center">Nama Pasien</th>
                                <th class="text-center">Keluhan</th>
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Diagnosa</th>
                                <th class="text-center">Poliklinik</th>
                                <th class="text-center">Data Obat</th>
                                <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>      
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $tampil = "SELECT * FROM tb_rm
                                            INNER JOIN tb_pasien ON tb_rm.id_pasien = tb_pasien.id_pasien 
                                            INNER JOIN tb_dokter ON tb_rm.id_dokter = tb_dokter.id_dokter
                                            INNER JOIN tb_poli ON tb_rm.id_poli = tb_poli.id_poli
                                            ";
                                $rekam_medis = mysqli_query($conn, $tampil) or die (mysqli_error($conn));
                                while ($data = mysqli_fetch_array($rekam_medis)) {?>
                                    <tr>
                                        <td class="text-center"><?=$no++?></td>
                                        <td class="text-center"><?=$data['tgl_periksa']?></td>
                                        <td class="text-center"><?=$data['nama_pasien']?></td>
                                        <td><?=$data['keluhan']?></td>
                                        <td class="text-center"><?=$data['nama_dokter']?></td>
                                        <td><?=$data['diagnosa']?></td>
                                        <td class="text-center"><?=$data['nama_poli']?></td>
                                        <td>
                                            <?php
                                                $obat = mysqli_query($conn,"SELECT * FROM tb_rm_obat INNER JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die (mysqli_error());
                                                while ($data_obat = mysqli_fetch_array($obat)) {
                                                    echo $data_obat['nama_obat']."<br>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="del.php?id=<?=$data['id_rm']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php 
                                }?>
                            
                        </tbody>
                    </table>
                </div>
            <script>
                $(document).ready(function(){
                    $('#rekam_medis').DataTable({
                        columnDefs: [
                            {
                                "orderable":false,
                                "targets": [0,8],
                                
                            }
                        ],
                        "order": [2,"asc"],
                        
                    });
                });

            </script>
        </div>
       

<?php include_once('../footer.php');?>