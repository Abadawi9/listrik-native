<?php 
session_start();
include '../koneksi.php';
$KodeTagihan = $_GET['kode'];
$NoTagihan = $_GET['notagihan'];
$query = query("select * from tbtagihan join tbpelanggan using(NoPelanggan) where KodeTagihan='$KodeTagihan'");
$hasil = jadiArray($query);
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container">
        <center>
            <h1>Detail Pembayaran</h1>
        </center>
        <form action="set-pembayaran.php" method="post">
            <table class='tengahsesuai' align="center">
                <input type="hidden" name="KodeTagihan" value="<?=$KodeTagihan; ?>">
                <tr>
                    <td>NoTagihan</td>
                    
                    <td>
                        <?=$hasil['NoTagihan']?>
                    </td>
                </tr>
                <tr>
                    <td>NamaPelanggan</td>
                    
                    <td>
                        <?=$hasil['NamaLengkap']?>
                    </td>
                </tr>
                <tr>
                    <td>Bulan / Tahun</td>
                    
                    <td>
                        <?=$hasil['BulanTagih']?>
                        /
                        <?=$hasil['TahunTagih']?>
                    </td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    
                    <td>
                        <?=$hasil['TotalBayar']?>
                    </td>
                </tr>
                <tr>
                    <td>BuktiPembayaran</td>
                    
                    <?php 
                    $query2 = query("select * from tbpembayaran join tbtagihan using(KodeTagihan) where      KodeTagihan='$KodeTagihan'");
                    $cek = hitungBaris($query2);
                    if($cek > 0)
                    { 
                    $hasil2 = jadiArray($query2); 
                    ?>
                    <td>
                        <img width="100px" src="<?=$hasil2['BuktiPembayaran']?>" alt="">
                    </td>
                <?php   
                    }
                    else
                    {
                    ?>
                    <td>
                        -
                    </td>
                <?php       
                    }
                ?>
                </tr>
                <tr>
                    <td>Status</td>
                    
                    <td>
                        <?=$hasil['Status']?>
                    </td>
                </tr>
                <tr>
                    <td>Set Satus</td>
                    
                    <td>
                        <select name="Status" required>
                            <option value="" selected>-- Pilih Status --</option>
                            <option value="Belum">Belum</option>
                            <option value="Sudah">Sudah</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                
                    <td>
                        <input type="submit" value="ubah">
                        <input type="reset" value="batal">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="navbawah">
        <br>
        <a href="index.php">Kembali Ke Cari Pelanggan</a>
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
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include '../navbar.php'; ?>
    <div class="container">
        <center>
            <h1>Detail Pembayaran</h1>
            <hr>
        </center>
        <form action="set-pembayaran.php" method="post">
            <table class='tengahkecil' align="center">
                <input type="hidden" name="KodeTagihan" value="<?=$KodeTagihan; ?>">
                <tr>
                    <td>NoTagihan</td>
                    
                    <td>
                        <?=$hasil['NoTagihan']?>
                    </td>
                </tr>
                <tr>
                    <td>NamaPelanggan</td>
                    
                    <td>
                        <?=$hasil['NamaLengkap']?>
                    </td>
                </tr>
                <tr>
                    <td>Bulan / Tahun</td>
                    
                    <td>
                        <?=$hasil['BulanTagih']?>
                        /
                        <?=$hasil['TahunTagih']?>
                    </td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    
                    <td>
                        <?=$hasil['TotalBayar']?>
                    </td>
                </tr>
                <tr>
                    <td>BuktiPembayaran</td>
                    <?php 
                    $query2 = query("select * from tbpembayaran join tbtagihan using(KodeTagihan) where      KodeTagihan='$KodeTagihan'");
                    $cek = hitungBaris($query2);
                    if($cek > 0)
                    { 
                    $hasil2 = jadiArray($query2); 
                    ?>
                    <td>
                        <img width="100px" src="<?=$hasil2['BuktiPembayaran']?>" alt="">
                    </td>
                <?php   
                    }
                    else
                    {
                    ?>
                    <td>
                        -
                    </td>
                <?php       
                    }
                ?>
                </tr>
                <tr>
                    <td>Satus</td>
                    
                    <td>
                    <?=$hasil['Status']?>
                    </td>
                </tr>
            </table>
        </form>
    </div> 
    <div class="navbawah">
        <br>
        <a href="index.php">Kembali Ke Cari Pelanggan</a>
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