 <?php 
 $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket");
  ?>
  <?php if ($_SESSION['role']=="admin"): ?>
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
                                            <th>Jenis Paket</th>
                                            <th>Nama Paket</th>
                                            <th>Harga</th> 
                                            <th>Action</th>                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paket as $pkt): ?>                                          
                                        <tr class="odd gradeA">
                                            <td><?php echo $pkt['jenis'] ?></td>
                                            <td><?php echo $pkt['nama_paket'] ?></td>
                                            <td><?php echo $pkt['harga'] ?></td> 
                                            <td>
                                                <form method="GET" style="float: left;">
                                                    <input type="hidden" value="<?php echo $pkt['id_paket'] ?>" name="id_paket">
                                                    <a href="index.php?ubahPaket=<?php echo $pkt['id_paket'] ?>" class="btn btn-sm btn-warning"><i class="icon-edit"></i></a>
                                                </form>                                                
                                                <form method="POST" style="float: right;">
                                                    <input type="hidden" value="<?php echo $pkt['id_paket'] ?>" name="id_paket">
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data Paket <?php echo $pkt['id_paket'] ?>?')" value="Hapus" name="hapus"><i class="icon-trash"></i></button>
                                                </form>
                                                 <?php 
                                                if (isset($_POST['hapus'])) {
                                                    $delete=mysqli_query($koneksi,"DELETE FROM tb_paket WHERE id_paket='$_POST[id_paket]'");
                                                    if ($delete) {
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?paket'
                                                        </script>";
                                                    }else{
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?paket'
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
                  
  <?php endif ?>