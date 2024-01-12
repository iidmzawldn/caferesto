<?php include('koneksi.php'); ?>
<div class="box box-info">
  <div class="box-header with-border">
    <font color="black">
    <h3>Data Menu</h3>
    <button class="btn btn-info" data-toggle="modal" data-target="#tambah">
      <span class="glyphicon glyphicon-plus"></span>
      Tambah Daftar Menu
    </button>
    <table class="table table-bordered">
    <table class="table table-bordered example2 table-striped" >
        <thead>
      <tr>
        <td width="40"><b>No</b></td>
        <td><b>Kode Menu</b></td>
        <td><b>Nama Menu</b></td>
        <td><b>Kategori</b></td>
        <td><b>Harga</b></td>
        <td><b>Gambar</b></td>
        <td width="70"><b>Aksi</b></td>
      </tr>
        </thead>
    <?php
    $No=1;
    $query=mysqli_query($koneksi, 'SELECT daftar_menu.*,kategori.* from daftar_menu,kategori WHERE daftar_menu.id_kategori=kategori.id_kategori');
    while ($menu=mysqli_fetch_array($query)) {
    ?> 
      <tbody>
      <tr>
        <td><?php echo $No ?></td>
        <td><?php echo $menu['kode_menu'] ?></td>
        <td><?php echo $menu['nama_menu'] ?></td>
        <td><?php echo $menu['nama_kategori'] ?></td>
        <td><?php echo $menu['harga_menu'] ?></td>
        <td style="text-align: center;"><img src="gambar/<?php echo $menu['gambar']; ?>" style="width: 128px; height: 108px;"></td>
        <td>
          <a href="hapus_menu.php?id_menu=<?php echo $menu['id_menu'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
      </tr>
      <?php
      $No++;
      }
      ?>
      </tbody>
    </table>
        <div class="modal fade" id="tambah">
          <div class="modal-dialog">
          <div class="modal-content">
            <form action="tambah_daftar.php" method="post" enctype="multipart/form-data">
          <div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Menu</h4></div>
          <div class="modal-body">
            <div class="form-group">
                <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu"></div>
            <div class="form-group">
                <input type="text" name="kode_menu" class="form-control" placeholder="Kode Menu"></div>
            <div class="form-group">
                <select name="kategori" class="form-control" placeholder="Masukan Kategori">
                  <?php
                  $query = mysqli_query($koneksi, "select * from kategori");
                  while($kategori = mysqli_fetch_array($query)){
                  ?>
                  <option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                  <?php } ?>
                </select></div>
            <div class="form-group">
                <input type="text" name="harga_menu" class="form-control" placeholder="Harga"></div>
            <div class="form-group">
                  <input type="file" name="gambar" class="form-control">
            </div>
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