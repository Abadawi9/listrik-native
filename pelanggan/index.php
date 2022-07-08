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
    <title>Halaman Input Pelanggan</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container">
        <center>
            <h1>input pelanggan</h1>
            <hr>
        </center>
        <br>
        <form action="simpan-pelanggan.php" method="post">
            <table class="tengahbesar" align="center">
                <tr>
                    <td>NoMeter</td>
                    
                    <td>
                        <input type="text" name="NoMeter" required>
                    </td>
                </tr>
                <tr>
                    <td>Tarif (Daya / TarifPerKwh / Beban)</td>
                    
                    <td>
                        <select name="KodeTarif" id="" required>
                            <option value="">-- Pilih Tarif --</option>
                            <?php 
                            $query = query("select * from tbtarif");
                            while($hasil = jadiArray($query)){
                                $tarif = $hasil['TarifPerKwh'];
                                $beban = $hasil['Beban'];
                                $tarifformat = number_format($tarif,0,'.','.');
                                $bebanformat = number_format($beban,0,'.','.');
                            ?>
                            <option value="<?=$hasil['KodeTarif'];?>">
                                <?=$hasil['Daya'];?> Watt /
                                <?=$tarifformat?> Rp / Rp
                                <?=$bebanformat?>
                            </option>
                            <?php 
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>NamaLengkap</td>
                    
                    <td>
                        <input type="text" name="NamaLengkap" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Telp</td>
                    
                    <td>
                        <input type="text" name="Telp" id="" required>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    
                    <td>
                        <input type="text" name="Alamat" id="" required>
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
        <a href="tampil-pelanggan.php">Lihat Data Pelanggan</a>
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