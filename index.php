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
    <!-- tengah -->
    <div class="container">
      <div class="alert alert-warning" role="alert">
        Klik button pilih menu di bawah untuk melihat menu !!!
      </div>
    <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
      <?php
      if(empty($_GET['kode_transaksi'])){
      ?>
      <table border="0" style="width: 100%; border-collapse: collapse;">
        <form method="POST" action="tambah_transaksi.php">
          <?php
          $hasil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM transaksi_pembelian"));
          $kode = str_pad($hasil[0]+1, 3, '0', STR_PAD_LEFT);
          $kode_transaksi =  "T".date("dmY").$kode;
           ?>
           <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
          <tr>
            <td>Kode Transaksi</td>
            <td>:</td>
            <td><?php echo $kode_transaksi ?></td>
          </tr>
          <tr>
            <td>Tanggal Transaksi</td>
            <td>:</td>
            <td><?php echo date("d-m-Y") ?></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">
              <input type="submit" name="save" value="Pilih Menu" class="btn btn-outline-info">
            </td>
          </tr>
        </form>
      </table>
      <?php
      }
      ?>
    </div>
    <div class="col-4"></div>        
    </div>
  </div>
    <!-- /.content -->      
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>