<?php include_once('../header.php');?>

        <div class="box">
            <h1>Dokter</h1>
            <h4>
                <small>Data Dokter</small>
                <div class="pull-right">
                    <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
                </div>
            </h4>
            <form action="post" name="proses">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dokter">
                        <thead >
                            <tr>
                                <th>
                                    <center>
                                        <input type="checkbox" id="select_all" value="">
                                    </center>
                                </th>
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Spesialis</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">No. Telepon</th>
                                <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dokter = mysqli_query($conn, "SELECT * FROM tb_dokter") or die (mysqli_error($conn));
                            if (mysqli_num_rows($dokter) > 0) {
                                while ($data = mysqli_fetch_array($dokter)) { ?>
                                    <tr>
                                        <td align="center">
                                            <input type="checkbox" class="cek" name="checked"  value="<?=$data['id_dokter']?>">
                                        </td>
                                        <td><?=$data['nama_dokter']?></td>
                                        <td><?=$data['spesialis']?></td>
                                        <td><?=$data['alamat']?></td>
                                        <td align="center"><?=$data['no_telp']?></td>
                                        <td align="center">
                                            <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
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
            <div class="box pull-right">
                <button class="btn btn-danger btn-sm" onclick="del()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#dokter').DataTable({
                    columnDefs: [
                        {
                            "orderable":false,
                            "targets": [0,5],
                            
                        }
                    ],
                    "order": [2,"asc"],
                    
                });
                $("#select_all").on('click', function() {
                    if (this.checked) {
                        $(".cek").each(function() {
                            this.checked = true;
                        })
                    } else{
                        $(".cek").each(function() {
                        this.checked = false;
                         })
                    }
                })

            });
            $(".cek").on('click', function() {
                if ($('.cek:checked').length == $('.cek').length) {
                    $('#select_all').prop('checked', true);
                }else{
                    $('#select_all').prop('checked', false);
                }
            });

        function del() {
            var conf = confirm('Yakin akan menghapus data?');
            if (conf) {
                const input = document.querySelectorAll('.cek');
                const id = [];
                for (let i = 0; i < input.length; i++) {
                    if (input[i].checked === true) {
                        id.push(input[i].value);
                    }
                    
                }

                window.location ='del.php?id=' + id;
            }
            
        }
        </script>

<?php include_once('../footer.php');?>