<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
    include '../koneksi.php';
    $KodeTarif = $_POST['KodeTarif'];
    $Daya = $_POST['Daya'];
    $TarifPerKwh = $_POST['TarifPerKwh'];
    $Beban = $_POST['Beban'];
    $update = query("update tbtarif set Daya='$Daya',TarifPerKwh='$TarifPerKwh',Beban='$Beban' where KodeTarif='$KodeTarif'");
    if($update)
    {
        echo "<script>
        alert('Data Berhasil Diedit');
        location.href='tampil-tarif.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Data GAGAL Diedit');
        location.href='index.php';
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