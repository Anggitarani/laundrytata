 <?php 
 $pelanggan=mysqli_query($koneksi,"SELECT * FROM tb_customer");
  ?>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telepon</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pelanggan as $pel): ?>                                          
                                        <tr class="odd gradeA">
                                            <td><?php echo $pel['nama_cust'] ?></td>
                                            <td><?php echo $pel['alamat'] ?></td>
                                            <td><?php echo $pel['jenis_kelamin'] ?></td>
                                            <td><?php echo $pel['telepon'] ?></td>
                                            <td><?php echo $pel['keterangan'] ?></td>
                                            <td>
                                                <form method="GET" style="float: left;">
                                                    <input type="hidden" value="<?php echo $pel['id_cust'] ?>" name="id_cust">
                                                    <a href="index.php?ubahPelanggan=<?php echo $pel['id_cust'] ?>" class="btn btn-sm btn-warning"><i class="icon-edit"></i></a>
                                                </form>                                                
                                                <form method="POST" style="float: right;">
                                                    <input type="hidden" value="<?php echo $pel['id_cust'] ?>" name="id_cust">
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data Pelanggan <?php echo $pel['nama_cust'] ?>?')" value="Hapus" name="hapus"><i class="icon-trash"></i></button>
                                                </form>
                                                <?php 
                                                if (isset($_POST['hapus'])) {
                                                    $delete=mysqli_query($koneksi,"DELETE FROM tb_customer WHERE id_cust='$_POST[id_cust]'");
                                                    if ($delete) {
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?pelanggan'
                                                        </script>";
                                                    }else{
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?pelanggan'
                                                        </script>";

                                                    }
                                                }
                                                 ?>
                                            </td>                                          
                                        </tr>    
                                        <?php endforeach ?>                                                               
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>