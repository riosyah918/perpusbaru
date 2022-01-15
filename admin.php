<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<div class="container">
<div class="mt-4 p-5 bg-warning text-white rounded">
  <h1>My Perpustakaan</h1>
  <p>rio pebrian syah</p>
</div>
    <div>
        <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>Navbar</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=petugas">Petugas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=anggota">Anggota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=buku">Buku</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
    </div>
    </div>
    </div>
    <div class="row">
            <div class="col-12">
        <?php
         if(isset($_GET['page'])){
          if ($_GET['page']=="anggota") {
              include('anggota.php');
          }elseif($_GET['page']=="anggota-delete"){
              include('anggota-delete.php');
          }elseif($_GET['page']=="anggota-insert"){
              include('anggota-insert.php');
          }elseif($_GET['page']=="anggota-edit"){
              include('anggota-edit.php');
          }
      }else{
          echo "<br><br><center><h1>Selamat Datang Administrator</h1></center><br><br>";
      }
      ?>
      </div>
  </div>
  <div class="row">
      <div class="col">
          <center>@rio pebrian syah 2022</center>
      </div>
  </div>
</div>
</body>
</html>