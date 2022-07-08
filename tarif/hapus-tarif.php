<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
include '../koneksi.php';
$kode = $_GET['kode'];
$hapus = mysqli_query($konek,"delete from tbtarif where KodeTarif='$kode'");
$cek = query("select * from tbpelanggan join tbtarif using(KodeTarif) where KodeTarif='$kode'");
    if($hapus)
    {
        echo "<script>
        alert('Data Berhasil Dihapus');
        location.href='tampil-tarif.php';
        </script>";
    }
    elseif($cek > 0)
    {
        echo "<script>
        alert('Data GAGAL Dihapus Karena Data Ini Masih Ada Relasi Di Tarif');
        location.href='tampil-tarif.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Data GAGAL Dihapus');
        location.href='tampil-tarif.php';
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