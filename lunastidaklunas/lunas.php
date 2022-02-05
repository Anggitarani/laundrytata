    <?php    
 $transaksi=mysqli_query($koneksi,"SELECT * FROM tb_transaksi INNER JOIN tb_user ON tb_transaksi.id_user=tb_user.id_user JOIN tb_customer ON tb_transaksi.id_cust=tb_customer.id_cust WHERE tb_transaksi.dibayar='dibayar'");
 if (isset($_POST['add'])) {
     if (RegPengguna($_POST)>0) {
         echo "<script>
        alert('Berhasil Menambahkan Data Pengguna')
        document.location.href='index.php?user'
        </script>";
     }else{
        echo "<script>
        alert('Berhasil Menambahkan Data Pengguna')
        document.location.href='index.php?user'
        </script>";
     }
 }
  ?>  
  <?php if ($_SESSION['role']!=="owner"): ?>
        
  <div class="container mb-5">
      <div class="row">
           <a href="index.php?tambah_transaksi" class="btn btn-sm btn-success">Tambah Data Transaksi</a>        
      </div>
  </div><br>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kode Invoice</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Order</th>
                                            <th>Batas Waktu</th>
                                            <th>Tanggal Bayar</th> 
                                            <th>Biaya Tambahan</th> 
                                            <th>Diskon</th> 
                                            <th>Status</th> 
                                            <th>Di Bayar</th>
                                           <!--  <th>Nama Pelayan</th>  -->  
                                            <th>Action Or Transaksi</th> 
                                            <th>Lanjut Pembayaran</th>                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaksi as $trk): ?>                                          
                                        <tr>
                                            <td><?php echo $trk['kode_invoice'] ?></td>
                                            <td><?php echo $trk['nama_cust'] ?></td>
                                            <td><?php echo $trk['tanggal_order'] ?></td>
                                            <td><?php echo $trk['batas_waktu'] ?></td> 
                                            <td><?php echo $trk['tanggal_bayar'] ?></td> 
                                            <td><?php echo $trk['biaya_tambahan'] ?></td> 
                                            <td><?php echo $trk['diskon'] ?></td>
                                            <td><?php echo $trk['status'] ?></td>
                                            <td>
                                                <?php if ($trk['dibayar']=="belum_dibayar"): ?>
                                                    Belum di Bayar
                                                <?php endif ?>
                                                <?php if ($trk['dibayar']=="dibayar"): ?>
                                                    Sudah Bayar
                                                <?php endif ?>                                                                                      
                                            </td>                                              
                                            <!-- <td><?php echo $trk['nama'] ?></td> -->   
                                            <td>
                                                 <form method="GET" style="float: left;">
                                                    <input type="hidden" value="<?php echo $trk['id_transaksi'] ?>" name="id_transaksi">
                                                    <a href="index.php?ubahTransaksi=<?php echo $trk['id_transaksi'] ?>" class="btn btn-sm btn-warning"><i class="icon-edit"></i></a>
                                                </form>                                                
                                                <form method="POST" style="float: right;">
                                                    <input type="hidden" value="<?php echo $trk['id_transaksi'] ?>" name="id_transaksi">
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data Transaksi <?php echo $trk['kode_invoice'] ?>?')" value="Hapus" name="hapus"><i class="icon-trash"></i></button>
                                                </form>
                                                  <?php 
                                                if (isset($_POST['hapus'])) {
                                                    $delete=mysqli_query($koneksi,"DELETE FROM tb_transaksi WHERE id_transaksi='$_POST[id_transaksi]'");
                                                    if ($delete) {
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?transaksi'
                                                        </script>";
                                                    }else{
                                                        echo "<script>                                                        
                                                        document.location.href='index.php?transaksi'
                                                        </script>";

                                                    }
                                                }
                                                 ?>
                                            </td> 
                                            <td> <a href="index.php?tambah_detail_transaksi=<?php echo $trk['id_transaksi'] ?>" class="btn btn-sm btn-success">Bayar</a></td>                                               
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