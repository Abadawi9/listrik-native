<?php
include '../koneksi.php';
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tammpil Data Tarif</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include "../navbar.php"; ?>
    <div class="container">
        <center>
            <h1>Data Tarif</h1>
            <hr>
        </center>
        <br>
        <table border="1px" width="100%">
            <tr>
                <th>Daya</td>
                <th>TarifPerKwh</td>
                <th>Beban</td>
                <th colspan="2">Aksi</th>
            </tr>
            <?php 
                $query = query("select * from tbtarif");
                while($hasil = jadiArray($query))
                {
            ?>
            <tr>
                <td>
                    <?=$hasil['Daya']?>
                </td>
                <td>Rp.
                    <?php
                $beban = $hasil['TarifPerKwh'];
                $tarifformat = number_format($beban,0,'.','.');
                echo $tarifformat;
                ?>
                </td>
                <td>Rp.
                    <?php
                $beban = $hasil['Beban'];
                $bebanformat = number_format($beban,0,'.','.');
                echo $bebanformat;
                ?>
                </td>
                <td align="center">
                    <a href="edit-tarif.php?kode=<?=$hasil['KodeTarif'];?>"><img  width="30px" src="../img/edit.jpg" alt=""></a>
                </td>
                <td align="center">
                    <a onclick="return confirm('yakin hapus ??');" href="hapus-tarif.php?kode=<?=$hasil['KodeTarif'];?>"><span>X</span></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <div class="navbawah">
        <br>
        <a href="index.php">Kembali Ke Input Tarif</a>
        <hr>
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