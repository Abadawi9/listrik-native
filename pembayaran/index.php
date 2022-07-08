<?php 
session_start();
include '../koneksi.php';
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
$query = query("select * from tbtagihan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>input Pembayaran</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php include '../navbar.php'; ?>
  <div class="container">
    <center>
      <h1>input pembayaran</h1>
      <hr>
    </center>
    <br>
    <form action="simpan-pembayaran.php" method="post">
      <table align="center" class='tengah'>
        <tr>
          <td>NoTagihan</td>
          <td>
            <select name="KodeTagihan" required>
              <option value="" selected="true">-- Pilih No Tagihan --</option>
              <?php 
                        $query = query("select * from tbtagihan");
                        while($hasil = jadiArray($query)){
                    ?>
              <option value="<?= $hasil['KodeTagihan']; ?>">
                <?=$hasil['NoTagihan']; ?>
              </option>
              <?php }?>
            </select>
          </td>
        </tr>
        <tr>
          <td>TglBayar</td>

          <td>
            <input type="text" name="TglBayar" id="" readonly value="<?=date(" Y-m-d"); ?>">
          </td>
        </tr>
        <tr>
          <td>JumlahTagihan</td>

          <td>
            <input type="text" name="JumlahTagihan" id="" required>
          </td>
        </tr>
        <tr>
          <td>BuktiPembayaran</td>

          <td>
            <input type="file" name="BuktiPembayaran" id="" required>
          </td>
        </tr>
        <tr>
          <td></td>

          <td>
            <input type="submit" value="simpan">
            <input type="reset" value="hapus">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div class="navbawah">
    <br>
    <a href="../home.php">Kembali Ke Halaman Utama</a>
  </div>
  <script src="../js/script.js"></script>
</body>

</html>
<?php
}
elseif(isset($_SESSION['Pelanggan']))
{
    $Username = $_SESSION['Username'];
    $query2 = query("select * from tbtagihan where NoPelanggan='$Username'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>input Pembayaran</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php include '../navbar.php'; ?>
  <div class="container">

    <center>
      <h1>input pembayaran</h1>
      <hr style="width:320px">
    </center>
    <br>
    <form action="simpan-pembayaran.php" method="post">
      <table class='tengahbesar' align="center">
        <tr>
          <td>NoTagihan</td>
          <td>:</td>
          <td>
            <select name="KodeTagihan" required>
              <option value="" selected="true">-- Pilih No Tagihan --</option>
              <?php 
                            while($hasil = jadiArray($query2))
                            {
                            ?>
              <option value="<?=$hasil['KodeTagihan']; ?>">
                <?=$hasil['NoTagihan']; ?>
              </option>
              <?php 
                            }
                            ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>TglBayar</td>
          <td>:</td>
          <td>
            <input type="text" name="TglBayar" id="" readonly value="<?=date(" Y-m-d"); ?>">
          </td>
        </tr>
        <tr>
          <td>JumlahTagihan</td>
          <td>:</td>
          <td>
            <input type="text" name="JumlahTagihan" id="">
          </td>
        </tr>
        <tr>
          <td>BuktiPembayaran</td>
          <td>:</td>
          <td>
            <input type="file" name="BuktiPembayaran" id="">
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <input type="submit" value="simpan">
            <input type="reset" value="hapus">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div class="navbawah">
    <br>
    <a href="index.php">Kembali Ke Pencarian Pelanggan</a>
    <br>
    <a href="../home.php">Kembali Ke Halaman Utama</a>
  </div>
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