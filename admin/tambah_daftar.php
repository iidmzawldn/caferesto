<?php 
include('koneksi.php');
$kode_menu = $_POST['kode_menu'];
$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga_menu = $_POST['harga_menu'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
  ?>
  <script type="text/javascript">
      window.alert("Tambah Menu Berhasil");
      document.location='index.php?menu=daftar_menu';
  </script>
  <?php
}else{
  if($ukuran < 1044070){    
    $xx = $rand.'_'.$filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
    mysqli_query($koneksi, "INSERT INTO daftar_menu VALUES(null,'$kode_menu','$nama_menu','$kategori','$harga_menu','$xx')");
    ?>
    <script type="text/javascript">
      window.alert("Tambah Menu Berhasil");
      document.location='index.php?menu=daftar_menu';
    </script>
    <?php

  }else{
    ?>
    <script type="text/javascript">
      window.alert("Tambah Menu Gagal");
      document.location='index.php?menu=daftar_menu';
    </script>
    <?php
  }
}