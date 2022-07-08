<?php 
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Input Tagihan</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php 
        include '../navbar.php';
    ?>
  <div class="container">
    <center>
      <h1>Cari Tagihan</h1>
      <hr>
    </center>
    <br>
    <form action="input-tagihan.php" method="post">
      <table class="tengah" align="center">
        <tr>
          <td>Cari NoPelanggan</td>
          <td>:</td>
          <td><input type="text" name="NoPelanggan" id="" required></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <input type="submit" value="cari" id="">
            <input type="reset" value="hapus" id="">
          </td>
        </tr>
      </table>
    </form>
    <!-- <a href="tampil-tagihan.php">Lihat Data</a> -->
  </div>
  <div class="navbawah">
    <br>
    <a href="../home.php">Kembali Ke Halaman Utama</a>
  </div>
</body>

</html>
<?php
} 
elseif(isset($_SESSION['Pelanggan']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Input Tagihan</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php include '../navbar.php'; ?>
  <div class="container">
    <center>
      <h1>Cari Tagihan</h1>
      <hr>
    </center>
    <br>
    <form action="input-tagihan.php" method="post">
      <table class='tengah' align="center">
        <tr>
          <td>Cari NoPelanggan</td>
          <td><input type="text" name="NoPelanggan" id="" value="<?=$_SESSION['Username']; ?>" readonly></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="cari" id="">
            <input type="reset" value="hapus" id="">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div class="navbawah">
    <br>
    <a href="../home.php">Kembali Ke Halaman Utama</a>
  </div>
  <!-- <a href="tampil-tagihan.php">Lihat Data</a> -->
</body>

</html>
<?php
}
else
{
    echo"<script>
    alert('Anda Tidak Boleh Masuk');
    location.href='../home.php';
    </script>";
}
?>