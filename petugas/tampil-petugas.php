<?php
include '../koneksi.php';

session_start();
if(isset($_SESSION['Admin']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style.css">
  <title>Tammpil Data Petugas</title>
</head>

<body>
  <?php include "../navbar.php"; ?>
  <div class="container">

    <center>
      <h1>Data Petugas</h1>
      <hr>
    </center>
    <br>
    <table border="1px" width="100%">
      <tr>
        <th>Username</th>
        <th>Password</td>
        <th>NamaLengkap</td>
        <th>Level</td>
        <th colspan="2">Aksi</th>
      </tr>
      <?php 
            $query = query("select * from tblogin where Level<>'Pelanggan'");
            while($hasil = jadiArray($query))
            {
        ?>
      <tr>
        <td>
          <?=$hasil['Username'];?>
        </td>
        <td>
        <?php 
        $pass = $hasil['Password'];
        for($no=1;$no<=strlen($pass);$no++)
        {
            echo "*";
        }
        ?>
        </td>
        <td>
          <?=$hasil['NamaLengkap'];?>
        </td>
        <td>
          <?=$hasil['Level'];?>
        </td>
        <td align="center">
          <a href="edit-petugas.php?kode=<?=$hasil['KodeLogin'];?>">
            <span>
              <img width="30px" src="../img/edit.jpg" alt=""></a>
          </span>
        </td>
        <td align="center">
          <a onclick="return confirm('yakin hapus ??');"
            href="hapus-petugas.php?kode=<?=$hasil['KodeLogin'];?>"><span>X</span></a>
        </td>
      </tr>
      <?php
            }
        ?>
    </table>
  </div>
  <div class="navbawah">
    <br>
    <a href="index.php">Kembali Ke Input Petugas</a>
    <br>
    <a href="../home.php">Kembali Halaman Utama</a>
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