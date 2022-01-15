<?php

if (isset($_GET['delete'])) {
    include('koneksi.php');
    $id = $_GET['id'];
    $query_delete = mysqli_query($koneksi,"DELETE FROM anggota WHERE id_anggota = '$id'");

    //Jika query delete berhasil maka munculkan notifikasi dan refresh halaman
    if ($query_delete) {
        ?>
        <div class="alert alert-warning">
            Data Berhasil DIHAPUS !!!!!!!!!!
        </div>
        <?php
        header('Refresh:1; URL=http://localhost/10_PTSGANJIL2021_XIIRPL2_EKOSAPUTRA/admin.php?page=anggota');
    }
}