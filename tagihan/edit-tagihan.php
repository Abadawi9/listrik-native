<?php 
    include '../koneksi.php';
    $kode = $_GET['kode'];
    $query = query("select * from tbpelanggan join tbtarif using(KodeTarif) where KodePelanggan='$kode'");
    $hasil = jadiArray($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Edit Tarif</title>
</head>

<body>
    <center>
        <h1>Edit tarif</h1>
    </center>
    <hr>
    <br>
    <form action="proses-edit-pelanggan.php" method="post">
        <table align="center">
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input value="<?=$hasil['KodePelanggan'];?>" type="hidden" name="KodePelanggan" id="" required>
                </td>
            </tr>
            <tr>
                <td>NoMeter</td>
                <td>:</td>
                <td>
                    <input value="<?=$hasil['NoMeter'];?>" type="text" name="NoMeter" id="" required>
                </td>
            </tr>
            <tr>
                <td>Tarif (Daya / TarifPerKwh / Beban)</td>
                <td>:</td>
                <td>
                    <select name="KodeTarif" id="">
                        <?php
                        $tarif = $hasil['TarifPerKwh'];
                        $beban = $hasil['Beban'];
                        $tarifformat = number_format($tarif,0,'.','.');
                        $bebanformat = number_format($beban,0,'.','.'); 
                        ?>
                        <option value="<?=$hasil['KodeTarif'];?>">
                        --
                        <?=$hasil['Daya'];?> Watt /
                        <?=$tarifformat?> Rp / Rp
                        <?=$bebanformat?> 
                        --
                        </option>
                        <?php 
                        $query2 = query("select * from tbtarif");
                        while($hasil2 = jadiArray($query2)){
                            $tarif = $hasil2['TarifPerKwh'];
                            $beban = $hasil2['Beban'];
                            $tarifformat = number_format($tarif,0,'.','.');
                            $bebanformat = number_format($beban,0,'.','.');
                        ?>
                        <option value="<?=$hasil2['KodeTarif'];?>">
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
                <td>:</td>
                <td>
                    <input value="<?=$hasil['NamaLengkap'];?>" type="text" name="NamaLengkap" id="" required>
                </td>
            </tr>
            <tr>
                <td>Telp</td>
                <td>:</td>
                <td>
                    <input value="<?=$hasil['Telp'];?>" type="text" name="Telp" id="" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <input value="<?=$hasil['Alamat'];?>" type="text" name="Alamat" id="" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="edit" id="">
                    <input type="reset" value="hapus" id="">
                </td>
            </tr>
        </table>
    </form>
    <a onclick="return confirm('tidak jadi edit ??');" href="tampil-tagihan.php">Lihat Data</a>
    <br>
    <hr>
    <a href="../home.php">Kembali</a>
</body>

</html>