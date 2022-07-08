<?php 
session_start();
if(isset($_SESSION['Admin']))
{

    include '../koneksi.php';
    $kode = $_GET['kode'];

    $hapus = mysqli_query($konek,"delete from tblogin where KodeLogin='$kode'");
        if($hapus)
        {
            echo "<script>
            alert('Data Berhasil Dihapus');
            location.href='tampil-petugas.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Data GAGAL Dihapus');
            location.href='tampil-petugas.php';
            </script>";

        }
}
else
{
    echo"<script>
    alert('Anda Tidak Boleh Masuk');
    location.href='../home.php';
    </script>";
}

?>