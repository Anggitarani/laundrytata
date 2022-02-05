<?php 
 $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket WHERE id_paket='$_GET[ubahPaket]'");
 $query=mysqli_fetch_assoc($paket);
if (isset($_POST['update'])) {
	if (ubahPaket($_POST)>0) {
		echo "<script>
		alert('Berhasil Mengubah Data Paket')
		document.location.href='index.php?paket'
		</script>";
	}else{
		echo "<script>
		alert('Gagal Mengubah Data Paket')
		document.location.href='index.php?paket'
		</script>";
	}
}
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Update Data Paket
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST">
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Jenis</label>
		<input type="hidden" value="<?php echo $query['id_paket'] ?>" name="id_paket">
		<select name="jenis" class="form-control">
			<option value="kiloan"> Kiloan </option>
			<option value="selimut"> Selimut </option>
			<option value="bed cover"> Bed-Cover </option>
			<option value="kaos"> Kaos </option>
			<option value="lain"> Lain </option>
		</select>
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Nama Paket</label>
		<input type="text" class="form-control" value="<?= $query['nama_paket']?>" name="nama_paket">
	</div>
	</div>
</div>		
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Harga</label>
		<input type="text" class="form-control" value="<?= $query['harga']?>" name="harga">
	</div>
	</div>
	<input type="submit" class="btn btn-success" value="Update Paket" name="update">
</div>	
</form>
</div>
