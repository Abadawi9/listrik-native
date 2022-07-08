<?php 
    include '../koneksi.php';
    session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
    $kode = $_GET['kode'];
    $query = query("select * from tbtarif where KodeTarif='$kode'");
    $hasil = jadiArray($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Edit Tarif</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include "../navbar.php"; ?>
    <div class="container">
        <center>
            <h1>Edit tarif</h1>
            <hr>
        </center>
        <br>
        <form action="proses-edit-tarif.php" method="post">
            <table class="tengah" align="center">
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="hidden" name="KodeTarif" id="" value="<?=$hasil['KodeTarif'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Daya (Watt)</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="Daya" id="" value="<?=$hasil['Daya'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>TarifPerKwh (Rp)</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="TarifPerKwh" id="" value="<?=$hasil['TarifPerKwh'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Beban (Rp)</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="Beban" id="" value="<?=$hasil['Beban'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" value="Edit" onclick="return confirm('yakin ingin edit ??');" id="">
                        <input type="reset" value="Hapus" id="">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="navbawah">
        <a onclick="return confirm('tidak jadi edit ??');" href="tampil-tarif.php">Lihat Data Tarif</a>
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