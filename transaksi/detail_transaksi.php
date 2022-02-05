 <?php 
 $detailTran=mysqli_query($koneksi,"SELECT * FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi=tb_transaksi.id_transaksi JOIN tb_customer ON tb_customer.id_cust=tb_transaksi.id_cust JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id_paket JOIN tb_user ON tb_user.id_user=tb_transaksi.id_user");
  ?>
<!--  <div class="container-fluid" style="padding-left: 1.2%;">
      <div class="row">
           <a href="index.php?tambah_detail_transaksi" class="btn btn-sm btn-success">Add Detail Transaksi</a>        
      </div>
  </div><br> -->
  <?php if ($_SESSION['role']!=="owner"): ?>       
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-responsive table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Customer</th>
                                            <th>Alamat Customer</th>
                                            <th>Telepon</th>
                                            <th>Nama Paket</th>
                                            <th>Jenis Paket</th>  
                                            <th>Harga Paket</th>                                          
                                            <th>Tanggal Order</th>
                                            <!-- <th>Batas Waktu</th> -->
                                            <th>Tanggal Bayar</th>                                          
                                            <th>Diskon</th> 
                                            <th>Status</th> 
                                            <th>Di Bayar</th>
                                            <th>Jumlah Barang</th>
                                            <th>Total Di Bayar</th>
                                            <th>Nama Pelayan</th>  
                                            <th>Action Or Detail Transaksi</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detailTran as $dtr): ?>                                          
                                        <tr>
                                            <td><?php echo $dtr['nama_cust'] ?></td>
                                            <td><?php echo $dtr['alamat'] ?></td>
                                            <td><?php echo $dtr['telepon'] ?></td>
                                            <td><?php echo $dtr['nama_paket'] ?></td> 
                                            <td><?php echo $dtr['jenis'] ?></td> 
                                            <td><?php echo $dtr['harga'] ?></td> 
                                            <td><?php echo $dtr['tanggal_order'] ?></td>
                                            <td><?php echo $dtr['tanggal_bayar'] ?></td> 
                                            <td><?php echo $dtr['diskon'] ?></td> 
                                            <td><?php echo $dtr['status'] ?></td>
                                            <td><?php echo $dtr['dibayar'] ?></td>
                                            <td><?php echo $dtr['jumlah'] ?></td>
                                            <td><?php echo $dtr['total_bayar'] ?></td>
                                            <td><?php echo $dtr['nama'] ?></td>
                                            <td>
                                                 <form method="GET" style="float: left;">
                                                    <input type="hidden" value="<?php echo $dtr['id'] ?>" name="id">
                                                    <a href="index.php?ubahDetailTransaksi=<?php echo $dtr['id'] ?>" class="btn btn-sm btn-warning"><i class="icon-edit"></i></a>
                                                </form>                                                
                                                <form method="POST" style="float: right;">
                                                    <input type="hidden" value="<?php echo $dtr['id'] ?>" name="id">
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data Detail Transaksi <?php echo $dtr['nama_cust'] ?>?')" value="Hapus" name="hapus"><i class="icon-trash"></i></button>
                                                </form>
                                                  <?php 
                                                if (isset($_POST['hapus'])) {
                                                    $delete=mysqli_query($koneksi,"DELETE FROM tb_detail_transaksi WHERE id='$_POST[id]'");
                                                    if ($delete) {
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?detail_transaksi'
                                                        </script>";
                                                    }else{
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?detail_transaksi'
                                                        </script>";

                                                    }
                                                }
                                                 ?>
                                            </td>
                                            <!-- <td><?php echo $dtr['nama'] ?></td>  -->                                                  
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