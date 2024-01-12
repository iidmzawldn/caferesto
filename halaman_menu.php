<?php include('admin/koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Cafe</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Ionicons/css/ionicons.min.css">

    <style type="text/css">
    @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
        }
        .col-4{
          width: 100%;
        }
    }
    </style>
  </head>

  <body style="background-color: #D9C6A3">

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #593622;">
        <a class="navbar-brand" href="index.html" style="font-family: sacramento;">Cafe & Resto</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                . . .
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="admin/login.php">Login</a>
              </div>
            </li>
          </ul>
        </div>  
    </nav>

 <!-- Page Content -->
    <div class="container-fluid">
    <div class="row">
    <div class="col-8 no-print">
    <div class="row">
    <?php
    $kode_transaksi =  $_GET['kode_transaksi'];
    $data_transaksi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM transaksi_pembelian WHERE kode_transaksi='$kode_transaksi'"));
     ?>
     <!-- -->
    <?php
    $no=1;
    $query=mysqli_query($koneksi, 'SELECT daftar_menu.*,kategori.* from daftar_menu,kategori WHERE daftar_menu.id_kategori=kategori.id_kategori');
    while ($menu=mysqli_fetch_array($query)) {
    ?> 
    <form action="tambah_pesanan.php" method="POST">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="admin/gambar/<?php echo $menu['gambar']; ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-text"><?php echo $menu['nama_menu'] ?></p>
                <p class="card-text">Kategori <?php echo $menu['nama_kategori'] ?></p>
                <p class="card-text">Harga : RP. <?php echo $menu['harga_menu'] ?> ,-</p>
                <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
                <input type="hidden" name="kode_menu" value="<?php echo $menu['kode_menu'] ?>">
                <input type="submit" name="save" value="Tambah" class="btn btn-primary">
              </div>
            </div>
        </form>
      <?php
      $no++;
      }
      ?>

    </div>
    </div>
    <div class="col-4">
    <div class="jumbotron">
      <h1 class="display-4">Transaksi Pembayaran</h1>
      <p class="lead">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col" hidden="">Jumlah</th>
            <th scope="col" class="no-print">Aksi</th>
          </tr>
        </thead>
        <?php
        $no=1;
          $query = mysqli_query($koneksi, "SELECT * FROM detail_transaksi INNER JOIN transaksi_pembelian ON transaksi_pembelian.kode_transaksi=detail_transaksi.kode_transaksi INNER JOIN daftar_menu ON daftar_menu.kode_menu=detail_transaksi.kode_menu WHERE transaksi_pembelian.kode_transaksi='$kode_transaksi'");
          $total = 0;
          while ($data = mysqli_fetch_array($query)) {
          $subtotal = $data['harga_menu']*$data['jumlah_barang'];
          ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $data['kode_menu'] ?></td>
            <td><?php echo $data['nama_menu'] ?></td>
            <td><?php echo $data['harga_menu'] ?></td>
            <td hidden=""><?php echo $data['jumlah_barang'] ?></td>
            <td class="no-print"><a href="hapus_detail_transaksi.php?kode_transaksi=<?php echo $kode_transaksi ?>&id_detail=<?php echo $data['id_detail'] ?>"><i class="fa fa-trash"></i></a></td>
          </tr>
          <?php
          $total += $subtotal;
          $no++;
          }
          ?>
          <!-- -->
          <form action="simpan_transaksi.php" method="POST">
         <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
          <tr>
            <td></td>
            <td>
            <td>Total Bayar :</td>
            <td><input type="text" name="total_bayar" class="form-control" value="<?php echo $total ?>"></td>
          </tr>
        </tbody>
      </table>
      </p>
      <p class="lead">
        <input type="submit" name="save" value="Bayar" class="btn btn-primary no-print">
   <button class="btn btn-success no-print" data-toggle="modal" data-target="#tambah" onclick="print()">
    <span class="glyphicon glyphicon-print"></span>
    Print
    </button>
    </div>
    </div>
    </div>  
  </div>
    <!-- /.content -->

    <!-- Footer -->
    <footer class="py-5 no-print" style="background-color: #593622;">
      
        <p class="m-0 text-center text-white">Copyright &copy; Cafe & Resto 2020 </p>
      
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>