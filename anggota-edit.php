<?php
if (isset($_POST['edit'])){
    include('koneksi.php');
    $nis                = $_GET['nis'];
    $nama               = $_GET['nama'];
    $kelas              = $_GET['kelas'];
    $jurusan            = $_GET['jurusan'];
    $tgl_lahir          = $_GET['tgl_lahir'];
    $no_telepon         = $_GET['no_telepon'];
    $alamat             = $_GET['alamat'];
    $jk                 = $_GET['jk'];

    $query_update = mysqli_query($koneksi,"UPDATE anggota
    SET nis = '$nis', nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', tgl_lahir = '$tgl_lahir', no_telepon = '$no_telepon', alamat = '$alamat', jk = '$jk', WHERE id_anggota = '$id'
        ");

if ($query_update) {
    ?>
        <script>
            alert('Data Berhasil DI Update !!!');
            window.location.href= 'admin.php?page=anggota';
        </script>
    <?php
}
}
if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = '$id'"); }//Digunakan untuk auto menampilkan data dari kolom yang ingin di ubah
    foreach ($query as $row) {

?>
<script>
    $(document).ready(function(){
        $("#edit-modal").modal('show');
    });
</script>
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <!-- Form Edit Anggota ======================================================================= -->

            <form action="anggota-edit.php" method="get"> <!-- form action kosong agar data tetap di halaman sendiri -->
            <input type="hidden" name="id" value="<?php echo $row['id_anggota']; ?>">
                <div class="form-group">
                    <input value="<?php echo $row['nis']; ?>" class="form-control" type="text" name="nis" placeholder="NIS" required>
                </div>
                <div class="form-group mt-2">
                    <input value="<?php echo $row['nama']; ?>" class="form-control" type="text" name="nama" placeholder="Nama Siswa" required>
                </div>
                <div class="form-group mt-2">
                    <select  class="form-control" name="kelas">
                        <option value="<?php echo $row['kelas']; ?>">
                            <?php
                if ($row['kelas']=='XIIRPL1') {
                   echo "XII RPL 1";
                }elseif($row['kelas']=='XIIRPL2'){
                    echo "XII RPL 2";
                }else{
                    echo "XII RPL 3";
                }
                            ?>
                        </option>
                        <option value="XIIRPL1">XII RPL 1</option>
                        <option value="XIIRPL2">XII RPL 2</option>
                        <option value="XIIRPL3">XII RPL 3</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <select value="<?php echo $row['nama']; ?>" class="form-control" name="jurusan">
                        <option value="<?php echo $row['jurusan']; ?>">
                            <?php
                if ($row['jurusan']=='RPL') {
                   echo "Rekayasa Perangkat Lunak";
                }elseif($row['jurusan']=='TAV'){
                    echo "Teknik Audio Video";
                }elseif($row['jurusan']=='TKR'){
                    echo "Teknik Kendaraan Ringan";
                }else{
                    echo "Teknik Instalasi Tenaga Listrik";
                }
                            ?>
                        </option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="TAV">Teknik Audio Video</option>
                        <option value="TKR">Teknik Kendaraan Ringan</option>
                        <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <div class="input-group">
                        <span class="input-group-text" >Tanggal Lahir</span>
                        <input value="<?php echo $row['tgl_lahir']; ?>" class="form-control" type="date" name="tanggal_lahir">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <input value="<?php echo $row['no_telp']; ?>" class="form-control" type="text" name="no_telp" placeholder="No Telepon">
                </div>
                <div class="form-group mt-2">
                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?php echo $row['alamat']; ?></textarea>
                </div>
                <div class="form-group mt-2">
                            <select class="form-control" name="jk">
                                <option value="<?php echo $row['jk'];?>"><?php echo $row['jk'];?></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
        <!-- =====================================================================================- -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success mt-2" type="submit" name="save-edit">Edit Data</button>
        </div>
            <!-- tag tutup formnya pinda ke sini -->
            </form>
            <!-- =========================================================- -->
        </div>
    </div>
</div>
</div>
<?php
}
?>
?>