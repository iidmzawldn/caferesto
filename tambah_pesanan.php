<?php
include('admin/koneksi.php');
$kode_transaksi=$_POST['kode_transaksi'];
$kode_menu=$_POST['kode_menu'];
$tambah = mysqli_query($koneksi, "INSERT into detail_transaksi values('','$kode_transaksi','$kode_menu','1')");
if($tambah){
	?>

		<script type="text/javascript">
			document.location='halaman_menu.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Error 404 Not Found");
			document.location='halaman_menu.php?kode_transaksi=<?php echo $kode_transaksi ?>';
		</script>

		<?php
	}
?>