<?php 
  $transaksi=mysqli_QUERY($koneksi,"SELECT * FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi=tb_transaksi.id_transaksi JOIN tb_customer ON tb_customer.id_cust=tb_transaksi.id_cust JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id_paket JOIN tb_user ON tb_user.id_user=tb_transaksi.id_user WHERE tb_detail_transaksi.id='$_GET[ubahDetailTransaksi]'");
  $query=mysqli_fetch_assoc($transaksi);

$jsArray = "var hrg_brg = new Array();\n"; 
if (isset($_POST['add'])) {
	if (ubahDetailTran($_POST)>0) {
		echo "<script>
		alert('Berhasil Mengubah Data Detail Transaksi')
		document.location.href='index.php?detail_transaksi'
		</script>";
	}else{
		echo "<script>
		alert('Gagal Mengubah Data Detail Transaksi)
		document.location.href='index.php?detail_transaksi'
		</script>";
	}
}
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Update Data Detail Transaksi / Pemesanan
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST" name='autoSumForm'>
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>ID TRANSAKSI / KODE INVOICE</label>
    <input type="text" value="<?php echo $query['id'] ?>" name="id">
		 <select class="form-control mt-3" name="id_transaksi" onchange="changeValue(this.value)" >          
            <?php foreach ($transaksi as $tr): ?>
            <option selected="" value="<?php echo $tr['id_transaksi'] ?>"><?php echo $tr['kode_invoice'] ?> (<?php echo $tr['nama_cust'] ?> - <?php echo $tr['alamat'] ?> - <?php echo $tr['dibayar'] ?>) </option>                  	
            <?php endforeach ?> 

    </select>  		
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Paket</label>
		 <?php
                            $result = mysqli_query($koneksi,"SELECT * FROM tb_paket");
                            $jsArray = "var prdName = new Array();\n";
                            echo '
                                  <select name="id_paket" class="form-control" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                            <option>- Pilih -</option>';
                             while ($row = mysqli_fetch_array($result)) {
                            echo '
                            <option value="' . $row['id_paket'] . '">' . $row['nama_paket'] . '</option>';
                            $jsArray .= "prdName['" . $row['id_paket'] . "'] = '" . addslashes($row['harga']) .  "';\n";
                             }
                            echo '
                            </select>';
       	?>
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
       <label>Jumlah</label>
       <input type="number" min="1" class="form-control" value="<?php echo $query['jumlah'] ?>" placeholder="Masukkan Jumlah" onfocus="startCalc();" onblur="stopCalc();" name="jumlah">
    </div>
	</div>	
</div>
<div class="row">
	<div class="col-xl-12">
	  <div class="form-group">
          <label>Harga</label>
          <input type="text" class="form-control" placeholder="Harga" readonly="" id="prd_name" onfocus="startCalc();" onblur="stopCalc();" name="harga">
      </div>
	</div>	
</div> 
<div class="row">
	<div class="col-xl-12">
	  <div class="form-group">
          <label>Keterangan Diskon</label>                         
            <input type="text" class="form-control" readonly="" name="keterangan" value="<?php echo $query['diskon'] ?>" placeholder="Keterangan Diskon">       
      </div>
	</div>	
</div>
<div class="row">
	<div class="col-xl-12">
	  <div class="form-group">
          <label>Total Di Bayar</label>
			<input class="form-control" readonly type="text" value="0" name="total_bayar" onchange="tryNumberFormat(this.form.twiceBox);" readonly>
      </div>
	</div>
	<input type="submit" class="btn btn-success" value="Update" name="add">
</div>	

</form>
</div>
<script type="text/javascript">
    <?php echo $jsArray; ?>    
</script>
   <script type="text/javascript">
    function startCalc(){
        interval = setInterval("calc()",1);
    }
    function calc(){
        one = document.autoSumForm.harga.value;
        two = document.autoSumForm.jumlah.value;
        tre = document.autoSumForm.keterangan.value;
        document.autoSumForm.total_bayar.value = (one*1)*(two*1)-(tre*1);
    }
    function stopCalc(){
        clearInterval(interval);
    }
</script>



