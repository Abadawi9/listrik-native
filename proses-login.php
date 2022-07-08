<?php 
session_start();
include 'koneksi.php';
$Username = $_POST['Username'];
$Password = $_POST['Password'];

$query = query("select * from tblogin where Username='$Username' and Password='$Password'");
$cek = hitungBaris($query);
if($cek > 0)
{
    
    $hasil = jadiArray($query);
    if($hasil['Level'] == "Admin")
    {
        $_SESSION['Admin'] = $hasil['Level'];
    }
    elseif($hasil['Level'] == "Petugas")
    {
        $_SESSION['Petugas'] = $hasil['Level'];
    }
    else
    {
        $_SESSION['Pelanggan'] = $hasil['Level'];
    }
    $_SESSION['Level'] = $hasil['Level'];
    $_SESSION['KodeLogin'] = $hasil['KodeLogin'];
    $_SESSION['Username'] = $hasil['Username'];
    $_SESSION['NamaLengkap'] = $hasil['NamaLengkap'];
    echo "<script>
    alert('Login Berhasil');
    location.href='home.php';
    </script>";
}
else
{
    
    echo "<script>
    alert('Login GAGAL');
    location.href='index.php';
    </script>";
}


?>