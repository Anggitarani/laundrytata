 <?php 
 $detailTran=mysqli_query($koneksi,"SELECT * FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi=tb_transaksi.id_transaksi JOIN tb_customer ON tb_customer.id_cust=tb_transaksi.id_cust JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id_paket JOIN tb_user ON tb_user.id_user=tb_transaksi.id_user");
 $null=mysqli_fetch_array($detailTran);
  ?>
 <div class="container-fluid" style="padding-left: 1.2%;">
      <div class="row">
                
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
                                <table class="table table-responsive table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Customer</th>                                           
                                            <th>Nama Paket</th>
                                            <th>Jenis Paket</th>  
                                            <th>Harga Paket</th>                                          
                                            <th>Jumlah</th>  
                                            <th>Diskon</th>                                    
                                            <th>Total</th>                                          
                                            <th>Di Bayar</th> 
                                            <th>Uang Kembali</th>
                                            <th>Status</th>                                                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sub=0; ?>
                                        <?php foreach ($detailTran as $dtr): ?>  
                                        
                                        <?php 
                                        $total=$dtr['harga']*$dtr['jumlah']-$dtr['diskon'];
                                        $subtotal=$sub+=$total;
                                        $kembali=$dtr['uang_dibayar']-$dtr['total_bayar'];
                                         ?>                                        
                                        <tr>
                                            <td><?php echo $dtr['nama_cust'] ?></td>                                           
                                            <td><?php echo $dtr['nama_paket'] ?></td> 
                                            <td><?php echo $dtr['jenis'] ?></td> 
                                            <td>Rp. <?php echo $dtr['harga'] ?></td>                                           
                                            <td><?php echo $dtr['jumlah'] ?></td>
                                            <td>Rp. <?php echo $dtr['diskon'] ?></td>
                                            <td>Rp. <?php echo $total ?></td>
                                            <td>Rp. <?php echo $dtr['uang_dibayar'] ?></td>
                                            <td>Rp. <?php echo $kembali ?></td>
                                            <td><?php echo $dtr['status'] ?></td>                                          
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
            <?php if (isset($null)): ?>
            <div class="container">
                <?php 
                $subtotal=number_format($subtotal,0,",",".");
                 ?>
                
                <div class="row">
                    <div class="col-lg-3">
                        <h2>Omset di Peroleh : </h2>
                        <h2><i class="icon-money"></i> Rp. <?php echo $subtotal ?></h2>
                    </div>
                </div>
            </div>  
            <?php endif ?>      