<?php 
if (isset($_POST['add'])) {
	if (RegPelanggan($_POST)>0) {
		echo "<script>
		alert('Berhasil Menambahkan Data Pelanggan')
		document.location.href='index.php?pelanggan'
		</script>";
	}else{
		echo "<script>
		alert('Gagal Menambahkan Data Pelanggan')
		document.location.href='index.php?pelanggan'
		</script>";
	}
}
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Tambah Data Pelanggan
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST">
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama_cust">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" class="form-control" name="alamat">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12 text-center">Jenis Kelamin</div>
</div>
<div class="row text-center">
	<div class="col-lg-6">
	<div class="form-group">
		<label>Laki-Laki</label>
		<input type="radio" value="laki-laki" class="form-control" name="jenis_kelamin">
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Perempuan</label>
		<input type="radio" value="perempuan" class="form-control" name="jenis_kelamin">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" class="form-control" name="telepon">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Keterangn</label>
		<select name="keterangan" class="form-control">
			<option value="member"> Member </option>
			<option value="non-member"> Non-Member </option>
		</select>
	</div>
	</div>
	<input type="submit" class="btn btn-success" value="Tambah Pelanggan" name="add">
</div>	
</form>
</div>
