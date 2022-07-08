<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
    include '../koneksi.php';

    $No = "10";
    $NoPelanggan = sprintf($No . rand(100,999));
    $NoMeter = $_POST['NoMeter'];
    $KodeTarif = $_POST['KodeTarif'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Telp = $_POST['Telp'];
    $Alamat = $_POST['Alamat'];
   
    $sqlSimpan = "INSERT INTO tbpelanggan (NoPelanggan, NoMeter, KodeTarif, NamaLengkap, Telp, Alamat) 
        VALUES ('$NoPelanggan','$NoMeter','$KodeTarif','$NamaLengkap','$Telp','$Alamat')";

    if(mysqli_query($konek, $sqlSimpan)){
        $Username = $NoPelanggan;
        $Password = $NoPelanggan;
        $Level = "Pelanggan";
        
        $queryUser = "INSERT INTO tblogin (Username, Password, NamaLengkap, Level) VALUES ('$Username', '$Password', '$NamaLengkap', '$Level')";
        mysqli_query($konek, $queryUser);

        echo "<script>
        alert('Data Berhasil Disimpan');
        location.href='tampil-pelanggan.php';
        </script>";

    } else{

        echo "<script>
        alert('Data GAGAL Disimpan');
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