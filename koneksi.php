<?php 
$koneksi=mysqli_connect("localhost","root","","nyuci");

function RegPelanggan($data)
{
	global $koneksi;

	$nama_cust=$data['nama_cust'];
	$alamat=$data['alamat'];
	$jenis_kelamin=$data['jenis_kelamin'];
	$telepon=$data['telepon'];
	$keterangan=$data['keterangan'];

	$query=mysqli_query($koneksi,"INSERT INTO tb_customer (nama_cust,alamat,jenis_kelamin,telepon,keterangan) VALUES ('$nama_cust','$alamat','$jenis_kelamin','$telepon','$keterangan')");
	return mysqli_affected_rows($koneksi);
}
function AddPaket($data)
{
	global $koneksi;

	$jenis=$data['jenis'];
	$nama=$data['nama_paket'];
	$harga=$data['harga'];

	$query=mysqli_query($koneksi,"INSERT INTO tb_paket (jenis,nama_paket,harga) VALUES ('$jenis','$nama','$harga')");
	return mysqli_affected_rows($koneksi);
}
function RegPengguna($data)
{
	global $koneksi;

	$nama=$data['nama'];
	$username=$data['username'];
	$password=md5($data['password']);
	$role=$data['role'];

	$cek=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username'");
	if (mysqli_fetch_assoc($cek)) {
		echo "<script>
		alert('Username $username sudah ada')
		document.location.href='index.php?user'
		</script>";
		return false;
	}

	$query=mysqli_query($koneksi,"INSERT INTO tb_user (nama,username,password,role) VALUES ('$nama','$username','$password','$role')");
	return mysqli_affected_rows($koneksi);
}
function transaksi($data)
{
	global $koneksi;

	$kode_invoice=$data['kode_invoice'];
	$id_cust=$data['id_cust'];
	$tanggal_order=$data['tanggal_order'];
	$batas_waktu=$data['batas_waktu'];
	$tanggal_bayar=$data['tanggal_bayar'];
	$biaya_tambahan=$data['biaya_tambahan'];
	$diskon=$data['diskon'];
	$status=$data['status'];
	$dibayar=$data['dibayar'];
	$id_user=$data['id_user'];

	$query=mysqli_query($koneksi,"INSERT INTO tb_transaksi (kode_invoice,id_cust,tanggal_order,batas_waktu,tanggal_bayar,biaya_tambahan,diskon,status,dibayar,id_user) VALUES ('$kode_invoice','$id_cust','$tanggal_order','$batas_waktu','$tanggal_bayar','$biaya_tambahan','$diskon','$status','$dibayar','$id_user')");
	return mysqli_affected_rows($koneksi);
}
function detail_transaksi($data)
{
	global $koneksi;

	$id_transaksi=$data['id_transaksi'];
	$id_paket=$data['id_paket'];
	$jumlah=$data['jumlah'];
	$total_bayar=$data['total_bayar'];
	$keterangan=$data['keterangan'];
	$uang_dibayar=$data['uang_dibayar'];
	if ($uang_dibayar<$total_bayar) {
		echo "<script>
		alert('Uang Kurang dari Total Bayar!')
		</script>";
		return false;
	}

	$query=mysqli_query($koneksi,"INSERT INTO tb_detail_transaksi (id_transaksi,id_paket,jumlah,total_bayar,keterangan,uang_dibayar) VALUES ('$id_transaksi','$id_paket','$jumlah','$total_bayar','$keterangan','$uang_dibayar')");
	return mysqli_affected_rows($koneksi);
}
function ubahPel($data)
{
	global $koneksi;

	$id=$data['id_cust'];
	$nama_cust=$data['nama_cust'];
	$alamat=$data['alamat'];
	$jenis_kelamin=$data['jenis_kelamin'];
	$telepon=$data['telepon'];
	$keterangan=$data['keterangan'];

	$query=mysqli_query($koneksi,"UPDATE tb_customer SET nama_cust='$nama_cust',alamat='$alamat',jenis_kelamin='$jenis_kelamin',telepon='$telepon',keterangan='$keterangan' WHERE id_cust='$id'");
	return mysqli_affected_rows($koneksi);
}
function ubahPengguna($data)
{
	global $koneksi;

	$id=$data['id_user'];	
	$nama=$data['nama'];
	$username=$data['username'];
	$password=md5($data['password']);
	$role=$data['role'];	

	$query=mysqli_query($koneksi,"UPDATE tb_user SET nama='$nama',username='$username',password='$password',role='$role' WHERE id_user='$id'");
	return mysqli_affected_rows($koneksi);
}
function ubahPaket($data)
{
	global $koneksi;

	$id=$data['id_paket'];	
	$jenis=$data['jenis'];
	$nama=$data['nama_paket'];
	$harga=$data['harga'];	

	$query=mysqli_query($koneksi,"UPDATE tb_paket SET jenis='$jenis',nama_paket='$nama',harga='$harga' WHERE id_paket='$id'");
	return mysqli_affected_rows($koneksi);
}
function ubahTransaksi($data)
{
	global $koneksi;

	$id=$data['id_transaksi'];	
	$kode_invoice=$data['kode_invoice'];
	$id_cust=$data['id_cust'];
	$tanggal_order=$data['tanggal_order'];
	$batas_waktu=$data['batas_waktu'];
	$tanggal_bayar=$data['tanggal_bayar'];
	$biaya_tambahan=$data['biaya_tambahan'];
	$diskon=$data['diskon'];
	$status=$data['status'];
	$dibayar=$data['dibayar'];
	$id_user=$data['id_user'];

	$query=mysqli_query($koneksi,"UPDATE tb_transaksi SET kode_invoice='$kode_invoice',id_cust='$id_cust',tanggal_order='$tanggal_order',batas_waktu='$batas_waktu',tanggal_bayar='$tanggal_bayar',biaya_tambahan='$biaya_tambahan',diskon='$diskon',status='$status',dibayar='$dibayar',id_user='$id_user' WHERE id_transaksi='$id'");
	return mysqli_affected_rows($koneksi);
}
function ubahDetailTran($data)
{
	global $koneksi;
	
	$id=$data['id'];
	$id_paket=$data['id_paket'];
	$id_transaksi=$data['id_transaksi'];
	$jumlah=$data['jumlah'];
	$total_bayar=$data['total_bayar'];
	$keterangan=$data['keterangan'];

	$query=mysqli_query($koneksi,"UPDATE tb_detail_transaksi SET id_transaksi='$id_transaksi',id_paket='$id_paket', jumlah='$jumlah',total_bayar='$total_bayar',keterangan='$keterangan' WHERE id='$id'");
	return mysqli_affected_rows($koneksi);
}
 ?>