<?php 
 $pelanggan=mysqli_query($koneksi,"SELECT * FROM tb_customer WHERE id_cust='$_GET[ubahPelanggan]'");
 $query=mysqli_fetch_assoc($pelanggan);
if (isset($_POST['update'])) {
	if (ubahPel($_POST)>0) {
		echo "<script>
		alert('Berhasil Mengubah Data Pelanggan')
		document.location.href='index.php?pelanggan'
		</script>";
	}else{
		echo "<script>
		alert('Gagal Mengubah Data Pelanggan')
		document.location.href='index.php?pelanggan'
		</script>";
	}
}
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Update Data Pelanggan
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST">
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="hidden" value="<?php echo $query['id_cust'] ?>" name="id_cust">
		<input type="text" class="form-control" value="<?= $query['nama_cust']?>" name="nama_cust">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" class="form-control" value="<?= $query['alamat']?>" name="alamat">
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
		<input type="radio" required="" value="laki-laki" class="form-control" name="jenis_kelamin">
	</div>
	</div>
	<div class="col-lg-6">
	<div class="form-group">
		<label>Perempuan</label>
		<input type="radio" required="" value="perempuan" class="form-control" name="jenis_kelamin">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" class="form-control" value="<?= $query['telepon']?>" name="telepon">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Keterangn</label>
		<select name="keterangan" required="" class="form-control">
			<option value="member"> Member </option>
			<option value="non-member"> Non-Member </option>
		</select>
	</div>
	</div>
	<input type="submit" class="btn btn-success" value="Update Pelanggan" name="update">
</div>	
</form>
</div>
