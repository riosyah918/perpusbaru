<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
	<script src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
	<?php //di taruh di atas, agar data langsung muncul tanpa perlu mengulang halaman
//start codingan input
if (isset($_POST['save'])) {
	$kode_buku	 = $_POST['kode_buku'];
	$judul_buku	 = $_POST['judul_buku'];
	$penulis	 = $_POST['penulis'];
	$penerbit    = $_POST['penerbit'];

	$query_insert =mysqli_query($koneksi, "INSERT INTO buku VALUES('','$kode_buku','$judul_buku','$penulis','$penerbit')");

	if ($query_insert){
		header("refresh:1, url=http://localhost/10_PTSGANJIL2021_XIIRPL2_EKOSAPUTRA/admin.php?page=buku");
	}else{
		echo "data gagal di simpan";
	}
}
//end codingan input
//start hapus
if(isset($_GET['hapus'])){
	$id = $_GET['id'];
	$query_delete =mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id'");
	if ($query_delete){
		echo "Data Berhasil di hapus";
		header("refresh:1, url=http://localhost/10_PTSGANJIL2021_XIIRPL2_EKOSAPUTRA/admin.php?page=buku");
	 	}
	}
?>
<center><h4 class="mt-4 mb-3">Data Buku</h4></center>
<div class="container">
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
  </button>
<table class="table table-striped">
	<tr>
		<TH >No</TH>
		<TH >Kode buku</TH>
		<TH >Judul Buku</TH>
		<TH >Penulis</TH>
		<TH >Penerbit</TH>
		<TH >Action</TH>
	</tr>

<?php 
$no = 1; //untuk nomer urut table
$query =mysqli_query($koneksi , "SELECT * FROM buku");
foreach ($query as $row) {
?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $row['kode_buku'] ?></td> 
		<td><?php echo $row['judul_buku'] ?></td>
		<td><?php echo $row['penulis'] ?></td>
		<td><?php echo $row['penerbit'] ?></td>
		<td valign="middle">
			<a href="?page=buku&hapus&id=<?php echo $row['id_buku']; ?>"> <!-- href digunakan untuk menambahkan $id untuk di hapus / edit -->
				<button class="btn btn-danger">Hapus</button>
		</td>
	</tr>

<?php
$no++; //increment di dalam foreach untuk no tabel
}
 ?>
</table>
<!-- Fin. Codingan Table -->

<!-- Start Codingan Insert -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">

        <div class="form-group mb-2">
            <input type="text" class="form-control" type="text" name="kode_buku" placeholder="isi Kode Buku.." required="">
        </div>

        <div class="form-group mb-2">
            <input type="text" class="form-control" type="text" name="judul_buku" placeholder="isi Judul Buku.." required="">
        </div>


        <div class="form-group mb-2">
            <input type="text" class="form-control" type="text" name="penulis" placeholder="isi penulis Buku.." required="">
        </div>

        <div class="form-group mb-2">
            <input type="text" class="form-control" type="text" name="penerbit" placeholder="isi Penerbit Buku.." required="">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="save" class="btn btn-primary">Save</button></div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>

        
      
<!-- Finish Codingan Insert -->
</div>
</body>
</html>