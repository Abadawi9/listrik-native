<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
include '../koneksi.php';
$KodeLogin = $_POST['KodeLogin'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$NamaLengkap = $_POST['NamaLengkap'];
$Level = $_POST['Level'];
$update = query("update tblogin set KodeLogin='$KodeLogin',Username='$Username',Password='$Password',NamaLengkap='$NamaLengkap',Level='$Level' where KodeLogin='$KodeLogin'");


if($update)
{
    echo "<script>
    alert('Data Berhasil Diedit');
    location.href='tampil-petugas.php';
    </script>";
}
else
{
    echo "<script>
    alert('Data GAGAL Diedit');
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