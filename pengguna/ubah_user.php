<?php 
 $user=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id_user='$_GET[ubahPengguna]'");
 $query=mysqli_fetch_assoc($user);
if (isset($_POST['update'])) {
	if (ubahPengguna($_POST)>0) {
		echo "<script>
		alert('Berhasil Mengubah Data Pengguna')
		document.location.href='index.php?user'
		</script>";
	}else{
		echo "<script>
		alert('Gagal Mengubah Data Pengguna')
		document.location.href='index.php?user'
		</script>";
	}
}
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-xl-12 text-center" style="font-family: times new roman;font-size: 200%;">
 			Update Data Pengguna
 		</div>
 	</div>
 </div>
<div class="container">
	<form method="POST">
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Nama</label>
		<input type="hidden" value="<?php echo $query['id_user'] ?>" name="id_user">
		<input type="text" class="form-control" value="<?= $query['nama']?>" name="nama">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" value="<?= $query['username']?>" name="username">
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12">
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" required="" name="password">
	</div>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12 text-center">Status</div>
</div>
<div class="row text-center">
	<div class="col-lg-4">
	<div class="form-group">
		<label>Admin</label>
		<input type="radio" required="" value="admin" class="form-control" name="role">
	</div>
	</div>
	<div class="col-lg-4">
	<div class="form-group">
		<label>Kasir</label>
		<input type="radio" required="" value="kasir" class="form-control" name="role">
	</div>
	</div>
	<div class="col-lg-4">
	<div class="form-group">
		<label>Owner</label>
		<input type="radio" required="" value="owner" class="form-control" name="role">
	</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<input type="submit" value="Ubah Data" name="update" class="btn btn-sm btn-success">
	</div>
</div>	
</form>
</div>
