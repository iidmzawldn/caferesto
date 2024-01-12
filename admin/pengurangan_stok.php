<?php include('koneksi.php'); ?>
<div class="col-md-6">
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
			<h3>Pengurangan Stok</h3>
			<div>&nbsp;</div>
			<form action="proses_pengurangan_stok.php" method="POST">
			<div class="form-group">
					<?php
                    $selBar    =mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY kode");        
                    echo '<select name="id_brg" class="form-control" required>';    
                    echo '<option value="">--- Pilih Barang ---</option>';    
                    while ($rowbar = mysqli_fetch_array($selBar)) {    
                    echo '<option value="'.$rowbar['id'].'">'.$rowbar['nama'].'_'.$rowbar['kode'].'</option>';    
                    }    
                    echo '</select>';
                    ?>
			</div>
			<div class="form-group">
				<input type="text" name="jumlah" class="form-control" placeholder="Ambil Stok">
			</div>
			<div class="form-group">
			<input type="submit" name="Submit" value="Submit" class="btn btn-success ">
			</div>
		</font>
	</div>
</div>
</div>
<div class="col-md-6">
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
			<h3>Data Barang Terbaru</h3>
			<table class="table table-bordered">
			<table class="table table-bordered example2 table-striped" >
				<thead>
			<tr>
				<td width="40"><b>No</b></td>
				<td><b>Kode Barang</b></td>
				<td><b>Nama Barang</b></td>
				<td><b>Stok Barang</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id ASC");
			while ($barang=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $barang['kode'] ?></td>
				<td><?php echo $barang['nama'] ?></td>
				<td><?php echo $barang['stok'] ?></td>
			</tr>
			<?php
			$No++;
			}
			?>
			</tbody>
		</table>
		</table>
		</font>
	</div>
</div>
</div>
</div>