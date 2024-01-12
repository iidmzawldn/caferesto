<?php
include('koneksi.php');
$id=$_GET['id'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$stok=$_POST['stok'];
$tambah = mysqli_query($koneksi, "UPDATE tb_barang SET kode='$kode',nama='$nama',stok='$stok' WHERE id='$id'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Data Barang Berhasil");
			document.location='index.php?menu=barang';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Edit Data Barang");
			document.location='index.php?menu=barang';
		</script>

		<?php
	}
?>