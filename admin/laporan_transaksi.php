<?php include('koneksi.php'); ?>
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
		<h3>Laporan Transaksi</h3>

<form action="" method="GET">
<input type="hidden" name="menu" value="laporan">
    <div class="form-group no-print">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" name="range" class="form-control" id="reservation" value="<?= (!empty($_GET['range']))?$_GET['range']:"" ?>" style="width: 200px;margin-right: 10px;">
          <button class="btn btn-primary">
            <i class="fa fa-refresh"></i>
          </button>
      </div>
    </div>
    </form>
		<table class="table table-bordered table-striped no-print">
			<table class="table table-bordered" >
				<thead>
			<tr>
				<td><b>No</b></td>
				<td><b>Kode Transaksi</b></td>
				<td><b>Jumlah Pembelian</b></td>
				<td><b>Total Harga</b></td>
				<td><b>Tanggal Transaksi</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			 if(isset($_GET['range'])){
				$range = $_GET['range'];
			}else{
				$range = "";
			}
            if(!empty($range)){
	    	$range = explode("-",trim($_GET['range']));
	          $start = date("Y/m/d",strtotime($range[0]));
	          $end = date("Y/m/d",strtotime($range[1]));
			$query=mysqli_query($koneksi, "SELECT *,SUM(jumlah_barang) as 'jumlah_barangnya',SUM(harga_menu*jumlah_barang) as 'total_harga'FROM detail_transaksi INNER JOIN transaksi_pembelian ON transaksi_pembelian.kode_transaksi=detail_transaksi.kode_transaksi INNER JOIN daftar_menu ON daftar_menu.kode_menu=detail_transaksi.kode_menu WHERE tanggal_transaksi BETWEEN '$start' AND '$end' GROUP BY transaksi_pembelian.kode_transaksi");
			while ($transaksi=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $transaksi['kode_transaksi'] ?></td>
				<td><?php echo $transaksi['jumlah_barangnya'] ?></td>
				<td><?php echo $transaksi['total_harga'] ?></td>
				<td><?php echo $transaksi['tanggal_transaksi'] ?></td>
			</tr>
			<?php
			$No++;
			}
			}
			?>
			</tbody>
		</table>
		<button class="btn btn-success no-print" data-toggle="modal" data-target="#tambah" onclick="print()">
					<span class="glyphicon glyphicon-print"></span>
					Print Laporan
		</button>
	</font>
	</div>
	</div>
	</div>
	