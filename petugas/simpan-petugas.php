<?php 
include '../koneksi.php';
session_start();
if(isset($_SESSION['Admin']))
{
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$NamaLengkap = $_POST['NamaLengkap'];
$Level = $_POST['Level'];
$sql = ("select * from tblogin where Username='$Username'");
$query = query($sql);
$cekuser = hitungBaris($query);
    var_dump($cekuser);
    if($cekuser > 0)
    {
        echo "<script>
        alert('Data Gagal Disimpan Username Tidak Boleh Sama');
        location.href='index.php';
        </script>";
    }
    else
    {   
        $sqlSimpan = "INSERT INTO tblogin (Username, Password, NamaLengkap, Level) VALUES ('$Username', '$Password', '$NamaLengkap', '$Level')";
        if(mysqli_query($konek, $sqlSimpan)){
            echo "<script>
            alert('Data Berhasil Disimpan');
            location.href='tampil-petugas.php';
            </script>";
        } else{
            echo "<script>
            alert('Data GAGAL Disimpan');
            location.href='tampil-petugas.php';
            </script>";
        }
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