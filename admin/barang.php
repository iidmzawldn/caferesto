<?php include('koneksi.php'); ?>
<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
		<h3>Data Barang</h3>

		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id = $_GET['id'];
			$data_barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id='$id'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit Barang</div>
				<div class="panel-body">
			<form action="edit_barang.php?id=<?php echo $id ?>" method="post">
						<div class="form-group">
								<input type="text" name="kode" class="form-control" placeholder="Kode Barang" value="<?php echo $data_barang['kode'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?php echo $data_barang['nama'] ?>"></div>
						<div class="form-group">
								<input type="text" name="stok" class="form-control" placeholder="Stok Barang" value="<?php echo $data_barang['stok'] ?>"></div>
						<div class="form-group">
								<input type="submit" name="aksi" value="Simpan" class="btn btn-success "></div>
			</form>
			</div>
			</div>
			<?php
		}
		?>
		<table class="table table-bordered">
			<table class="table table-bordered example2 table-striped" >
				<thead>
			<tr>
				<td width="40"><b>No</b></td>
				<td><b>Kode Barang</b></td>
				<td><b>Nama Barang</b></td>
				<td><b>Stok Barang</b></td>
				<td width="70"><b>Aksi</b></td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, 'SELECT * from tb_barang');
			while ($barang=mysqli_fetch_array($query)) {
			?>
			<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $barang['kode'] ?></td>
				<td><?php echo $barang['nama'] ?></td>
				<td><?php echo $barang['stok'] ?></td>
				<td>
					<a href="index.php?menu=barang&aksi=edit&id=<?php echo $barang['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="hapus_barang.php?id=<?php echo $barang['id'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			<?php
			$No++;
			}
			?>
			</tbody>
		</table>
		<button class="btn btn-info" data-toggle="modal" data-target="#tambah">
					<span class="glyphicon glyphicon-plus"></span>
					Tambah Barang
				</button>
				<div class="modal fade" id="tambah">
					<div class="modal-dialog">
					<div class="modal-content">
						<form action="tambah_barang.php" method="post">
					<div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Barang</h4></div>
					<div class="modal-body">
						<div class="form-group">
								<input type="text" name="kode" class="form-control" placeholder="Kode Barang"></div>
						<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Nama Barang"></div>
						<div class="form-group">
								<input type="text" name="stok" class="form-control" placeholder="Stok Barang"></div>
						</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
						<input type="reset" value="Reset" class="btn btn-warning">
						<input type="submit" name="aksi" value="Simpan" class="btn btn-success">
					</div>
					</form>
					</div>
					</div>
					</div>
	</font>
	</div>
	</div>
	</div>