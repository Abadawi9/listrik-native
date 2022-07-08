<?php
include "../koneksi.php";
session_start();
$kode = $_GET['kode'];
$nopelanggan = $_GET['nopelanggan'];
$query = query("select * from tbtagihan join tbpelanggan using(NoPelanggan) where KodeTagihan='$kode'");
$hasil = jadiArray($query);
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']) || isset($_SESSION['Pelanggan']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php 
        $query2 = query("select * from tbpembayaran where KodeTagihan='$kode'");
        $cek = hitungBaris($query2);
        if($cek > 0)
        { 
            $hasil2 = jadiArray($query); 
        ?>
    <fieldset>
        <center>
            <h1>Cetak Nota Pt. Pembayaran Listrik Pasca Bayar</h1>
        </center>
        <table align="center">
            <tr>
                <td>NamaPelanggan</td>
                <td>:</td>
                <td>
                    <?=$hasil['NamaLengkap']; ?>
                </td>
            </tr>
            <tr>
                <td>NoMeter</td>
                <td>:</td>
                <td>
                    <?=$hasil['NoMeter']; ?>
                </td>
            </tr>
        </table>
        <br>
        <table border="1px" align="center" width="80%">
            <tr>
                <td>No</td>
                <td>NoTagihan</td>
                <td>TahunTagih</td>
                <td>BulanTagih</td>
                <td>JumlahPemakaian</td>
                <td>TotalBayar</td>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <?=$hasil['NoTagihan'];?>
                </td>
                <td>
                    <?=$hasil['TahunTagih'];?>
                </td>
                <td>
                    <?=$hasil['BulanTagih'];?>
                </td>
                <td>
                    <?=$hasil['JumlahPemakaian'];?>
                </td>
                <td>Rp.
                    <?php $total = $hasil['TotalBayar']; ?>
                    <?=number_format($total,2,'.','.')?>
                </td>
            </tr>

        </table>
        <br>
        <br>
        <br>
        <table width="80%" align="center">
            <tr>
                <td>
                    Pembayaran Berhasil Terima Kasih Sudah Bertransaksi ...
                    <br>
                    <br>
                    Admin.
                </td>
            </tr>
        </table>
    </fieldset>
    <?php    
        }
        else
        {
        ?>
    <fieldset>
        <center>
            <h1>Cetak Nota Pt. Pembayaran Listrik Pasca Bayar</h1>
        </center>
        <table align="center">
            <tr>
                <td>NamaPelanggan</td>
                <td>:</td>
                <td>
                    <?=$hasil['NamaLengkap']; ?>
                </td>
            </tr>
            <tr>
                <td>NoMeter</td>
                <td>:</td>
                <td>
                    <?=$hasil['NoMeter']; ?>
                </td>
            </tr>
        </table>
        <br>
        <table border="1px" align="center" width="80%">
            <tr>
                <td>No</td>
                <td>NoTagihan</td>
                <td>TahunTagih</td>
                <td>BulanTagih</td>
                <td>JumlahPemakaian</td>
                <td>TotalBayar</td>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <?=$hasil['NoTagihan'];?>
                </td>
                <td>
                    <?=$hasil['TahunTagih'];?>
                </td>
                <td>
                    <?=$hasil['BulanTagih'];?>
                </td>
                <td>
                    <?=$hasil['JumlahPemakaian'];?>
                </td>
                <td>Rp.
                    <?php $total = $hasil['TotalBayar']; ?>
                    <?=number_format($total,2,'.','.')?>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table width="80%" align="center">
            <tr>
                <td>
                Silahkan Melakukan Pembayaran Sesuai Dengan Total Biaya Yang Di Atas Ke Rekening Bank Mandiri Dengan No
                    Rekening 1235456..
                    <br>
                    <br>
                    Admin.
                </td>
            </tr>
        </table>
    </fieldset>
    <?php 
        }
        ?>

    <a href="javascript: window.print()">Cetak Nota</a>
    <br>
    <a href="index.php">Kembali</a>
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