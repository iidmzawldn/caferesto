<?php
include('koneksi.php');
$id_menu=$_GET['id_menu'];
$hapus = mysqli_query($koneksi, "DELETE FROM daftar_menu WHERE id_menu='$id_menu'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Menu Berhasil");
			document.location='index.php?menu=daftar_menu';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Menu");
			document.location='index.php?menu=daftar_menu';
		</script>

		<?php
	}
?>