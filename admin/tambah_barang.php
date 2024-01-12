<?php
include('koneksi.php');
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$stok=$_POST['stok'];
$tambah = mysqli_query($koneksi, "INSERT into tb_barang values('','$kode','$nama','$stok')");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Tambah Barang Berhasil");
			document.location='index.php?menu=barang';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Barang");
			document.location='index.php?menu=barang';
		</script>

		<?php
	}
?>