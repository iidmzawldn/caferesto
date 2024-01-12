<?php
include('koneksi.php');
$id=$_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id='$id'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Barang Berhasil");
			document.location='index.php?menu=barang';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Barang");
			document.location='index.php?menu=barang';
		</script>

		<?php
	}
?>