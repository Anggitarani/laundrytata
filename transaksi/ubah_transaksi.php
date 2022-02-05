 <?php 
 $cust=mysqli_query($koneksi,"SELECT * FROM tb_customer");
 $user=mysqli_query($koneksi,"SELECT * FROM tb_user");
 $transaksi=mysqli_query($koneksi,"SELECT * FROM tb_transaksi WHERE id_transaksi='$_GET[ubahTransaksi]'");
 $query=mysqli_fetch_assoc($transaksi);
 if (isset($_POST['add'])) {
 	if (ubahTransaksi($_POST)>0) {
 		echo "<script>
		alert('Berhasil Mengubah Data Transaksi')
		document.location.href='index.php?transaksi'
		</script>";
 	}else{
 		echo "<script>
		alert('Gagal Mengubah Data Transaksi')
		document.location.href='index.php?transaksi'
		</script>";
 	}
 }
  ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Update Data Transaksi
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST">

<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label>Kode Invoice</label>
		<input type="hidden" value="<?php echo $query['id_transaksi'] ?>" name="id_transaksi">
		<input type="text" class="form-control" placeholder="A109BF8" value="<?php echo $query['kode_invoice'] ?>" name="kode_invoice">
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Nama Customer</label>
		<select class="form-control" name="id_cust">
			<?php foreach ($cust as $cst): ?>
				<option value="<?php echo $cst['id_cust'] ?>"><?php echo $cst['nama_cust'] ?></option>
			<?php endforeach ?>
		</select>		
	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label>Tanggal Order</label>
		<input type="date" class="form-control" value="<?php echo $query['tanggal_order'] ?>" name="tanggal_order">
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Batas Waktu</label>
		<input type="date" class="form-control" value="<?php echo $query['batas_waktu'] ?>" name="batas_waktu">
	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label>Tanggal Bayar</label>
		<input type="date" class="form-control" value="<?php echo $query['tanggal_bayar'] ?>" name="tanggal_bayar">
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Biaya Tambahan</label>
		<input type="text" class="form-control" value="<?php echo $query['biaya_tambahan'] ?>" name="biaya_tambahan">
	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label>Diskon</label>
		<input type="text" placeholder=" /Tanpa Diskon" value="<?php echo $query['diskon'] ?>" class="form-control" name="diskon">
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="baru">Baru</option>
			<option value="proses">Proses</option>
			<option value="selesai">Selesai</option>
			<option value="diambil">Di Ambil</option>
		</select>
	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
	<div class="form-group">
		<label>Di Bayar</label>
		<select class="form-control" name="dibayar">
			<option value="dibayar">Di Bayar</option>
			<option value="belum_dibayar">Belum Di Bayar</option>		
		</select>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Nama Pelayan</label>
		<select class="form-control" name="id_user">
		<?php foreach ($user as $usr): ?>
			<option value="<?php echo $usr['id_user'] ?>"><?php echo $usr['nama'] ?></option>		
		<?php endforeach ?>	
		</select>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<input type="submit" class="btn btn-success btn-sm" name="add">
	</div>
</div>
</form>
</div>
