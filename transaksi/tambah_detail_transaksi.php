<?php 
if ($_GET['tambah_detail_transaksi']=="") {
 echo "<script>document.location.href='index.php?transaksi'</script>";
}
if ($_GET['tambah_detail_transaksi']=="") {
  $transaksi=mysqli_QUERY($koneksi,"SELECT * FROM tb_transaksi INNER JOIN tb_customer ON tb_transaksi.id_cust=tb_customer.id_cust");
  $query=mysqli_fetch_assoc($transaksi);
}
if ($_GET['tambah_detail_transaksi']!=="") {
  $transaksi=mysqli_QUERY($koneksi,"SELECT * FROM tb_transaksi INNER JOIN tb_customer ON tb_transaksi.id_cust=tb_customer.id_cust WHERE tb_transaksi.id_transaksi='$_GET[tambah_detail_transaksi]'");
  $query=mysqli_fetch_assoc($transaksi);
}

$jsArray = "var hrg_brg = new Array();\n"; 
if (isset($_POST['add'])) {
	if (detail_transaksi($_POST)>0) {
		echo "<script>
		alert('Berhasil Menambahkan Data Detail Transaksi')
		document.location.href='index.php?detail_transaksi'
		</script>";
	}else{
		echo "<script>
		alert('Gagal Menambahkan  Data Detail Transaksi)
		document.location.href='index.php?detail_transaksi'
		</script>";
	}
}
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Tambah Data Detail Transaksi / Pemesanan
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST" name='autoSumForm'>
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>ID TRANSAKSI / KODE INVOICE</label>
		 <select class="form-control mt-3" name="id_transaksi" onchange="changeValue(this.value)" >
            <option>- Pilih Id Transaksi -</option> 
            <?php foreach ($transaksi as $tr): ?>
            <option value="<?php echo $tr['id_transaksi'] ?>"><?php echo $tr['kode_invoice'] ?> (<?php echo $tr['nama_cust'] ?> - <?php echo $tr['alamat'] ?> - <?php echo $tr['dibayar'] ?>) </option>                  	
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
       <input type="number" min="1" class="form-control" placeholder="Masukkan Jumlah" onfocus="startCalc();" onblur="stopCalc();" name="jumlah">
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
          <?php if ($_GET['tambah_detail_transaksi']!==""): ?>                 
            <input type="text" class="form-control" name="keterangan" value="<?php echo $query['diskon'] ?>" placeholder="Keterangan Diskon"> 
          <?php endif ?> 
          <?php if ($_GET['tambah_detail_transaksi']==""): ?>                 
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Diskon/Kosongkan"> 
          <?php endif ?>                  
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
  <div class="col-xl-12">
    <div class="form-group">
          <label>Uang Di Bayar</label>
      <input class="form-control" type="text" name="uang_dibayar">
      </div>
  </div>
	<input type="submit" class="btn btn-success" value="Tambahkan" name="add">
</div>	

</form>
</div>
<script type="text/javascript">
    <?php echo $jsArray; ?>    
</script>
<?php if ($query['diskon']==""): ?>
   <script type="text/javascript">
    function startCalc(){
        interval = setInterval("calc()",1);
    }
    function calc(){
        one = document.autoSumForm.harga.value;
        two = document.autoSumForm.jumlah.value;
        document.autoSumForm.total_bayar.value = (one*1)*(two*1);
    }
    function stopCalc(){
        clearInterval(interval);
    }
</script>
<?php endif ?>
<?php if ($query['diskon']!==""): ?>
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
<?php endif ?>



