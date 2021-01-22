<?php include_once('../header.php');?>

        <div class="box">
            <h1>Poliklinik</h1>
            <h4>
                <small>Data Poliklinik</small>
                <div class="pull-right">
                    <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Poli</a>
                </div>
            </h4>
            <form action="post" name="proses">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead >
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Poliklinik</th>
                                <th class="text-center">Gedung</th>
                                <th>
                                    <center>
                                        <input type="checkbox" id="select_all" value="">
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                $poli = mysqli_query($conn, "SELECT * FROM tb_poli ORDER BY  nama_poli ASC") or die (mysqli_error($conn));
                                if (mysqli_num_rows($poli) > 0) {
                                    while ($data = mysqli_fetch_array($poli)) { ?>
                                        <tr>
                                            <td align="center"><?=$no++ ?>.</td>
                                            <td><?=$data['nama_poli']?></td>
                                            <td><?=$data['gedung']?></td>
                                            <td align="center">
                                            <input type="checkbox" class="cek" name="checked"  value="<?=$data['id_poli']?>">
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    
                                }else {
                                    echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="box pull-right">
                <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i> Ubah</button>
                <button class="btn btn-danger btn-sm" onclick="del()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
            </div>
        </div>
        <script>
            $(document).ready(function(){
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

        function edit() {
            const input = document.querySelectorAll('.cek');
            const id = [];
            for (let i = 0; i < input.length; i++) {
                if (input[i].checked === true) {
                        id.push(input[i].value);
                }
            }
            window.location.href ='edit.php?id=' + id;
                    
        }
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