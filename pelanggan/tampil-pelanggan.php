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
    <title>Tammpil Data Pelanggan</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php 
    include '../navbar.php';
    ?>
    <div class="container">

        <center>
            <h1>Data Pelanggan</h1>
            <hr>
        </center>
        <br>
        <table border="1px" width="100%">
            <tr>
                <th>No</td>
                <th>NoPelanggan</td>
                <th>NoMeter</td>
                <th>Tarif (Daya / TarifPerKwh / Beban)</td>
                <th>NamaLengkap</td>
                <th>Telp</td>
                <th>Alamat</td>
                <th colspan="2">Aksi</th>
            </tr>
            <?php 
                $No = 0;
                $query = query("select * from tbpelanggan join tbtarif using(KodeTarif)");
                while($hasil = jadiArray($query))
                {
                    $No++;
            ?>
            <tr>
                <td>
                    <?=$No?>
                </td>
                <td>
                    <?=$hasil['NoPelanggan'];?>
                </td>
                <td>
                    <?=$hasil['NoMeter'];?>
                </td>
                <td>
                    Rp.
                    <?php
                    $daya = $hasil['Daya'];
                    $tarif = $hasil['TarifPerKwh'];
                    $beban = $hasil['Beban'];
                    $tarifformat = number_format($tarif,0,'.','.');
                    $bebanformat = number_format($beban,0,'.','.');
                    ?>
                    <?=$daya?>Watt <br> Rp.
                    <?=$tarifformat?> Rp.
                    <?=$bebanformat?>
                </td>
                <td>
                    <?=$hasil['NamaLengkap'];?>
                </td>
                <td>
                    <?=$hasil['Telp'];?>
                </td>
                <td>
                    <?=$hasil['Alamat'];?>
                </td>
                <td>
                    <a href="edit-pelanggan.php?kode=<?=$hasil['KodePelanggan'];?>"><img width="30px" src="../img/edit.jpg" alt=""></a>
                </td>
                <td>
                    <a onclick="return confirm('yakin hapus ??');" href="hapus-pelanggan.php?kode=<?=$hasil['KodePelanggan'];?>"><span>X</span></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <div class="navbawah">
        <br>
        <a href="index.php">Kembali Ke Input Pelanggan</a>
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