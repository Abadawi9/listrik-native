<?php 
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
    <title>Halaman Input Tarif</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include "../navbar.php" ?>
    <div class="container">
        <center>
            <h1>input tarif</h1>
            <hr>
        </center>
        <br>
        <form action="simpan-tarif.php" method="post">
            <table class="tengah" align="center">
                <tr>
                    <td>Daya</td>
                    
                    <td>
                        <input type="text" name="Daya" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>TarifPerKwh</td>
                    
                    <td>
                        <input type="text" name="TarifPerKwh" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Beban</td>
                    
                    <td>
                        <input type="text" name="Beban" id="" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="simpan" id="">
                        <input type="reset" value="hapus" id="">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="navbawah">
        <a href="tampil-tarif.php">Lihat Data Tarif</a>
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