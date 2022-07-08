<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
include '../koneksi.php';
$KodePelanggan = $_POST['KodePelanggan'];
$NoMeter = $_POST['NoMeter'];
$KodeTarif = $_POST['KodeTarif'];
$NamaLengkap = $_POST['NamaLengkap'];
$Telp = $_POST['Telp'];
$Alamat = $_POST['Alamat'];
$update = query("update tbpelanggan set KodePelanggan='$KodePelanggan',NoMeter='$NoMeter',KodeTarif='$KodeTarif',NamaLengkap='$NamaLengkap',Telp='$Telp',Alamat='$Alamat' where KodePelanggan='$KodePelanggan'");
if($update)
{
    echo "<script>
    alert('Data Berhasil Diedit');
    location.href='tampil-pelanggan.php';
    </script>";
}
else
{
    echo "<script>
    alert('Data GAGAL Diedit');
    location.href='tampil-pelanggan.php';
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