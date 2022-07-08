<?php
session_start();
include '../koneksi.php';
$NoPelanggan = $_POST['NoPelanggan'];
$cari = query("select * from tbpelanggan where NoPelanggan='$NoPelanggan'");

if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']) || isset($_SESSION['Pelanggan']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Input Tagihan</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php include '../navbar.php';
  $cekdata = hitungBaris($cari);
  if($cekdata > 0)
  {
  $hasil = jadiArray($cari);
  ?>
  <div class="container">
    <center>
      <h1>Input Tagihan</h1>
      <hr>
    </center>
    <table class="sambungtable">
      <tr>
        <td>NoPelanggan</td>
        <td>
          <?=$hasil['NoPelanggan'];?>
        </td>
      </tr>
      <tr>
        <td>NoMeter</td>

        <td>
          <?=$hasil['NoMeter'];?>
        </td>
      </tr>
      <tr>
        <td>NamaPelanggan</td>

        <td>
          <?=$hasil['NamaLengkap'];?>
        </td>
      </tr>
      <tr>

      </tr>
    </table>
    <table border="1px" align="center" width="100%">
      <tr>
        <th>NoTagihan</td>
        <th>TahunTagih</td>
        <th>BulanTagih</td>
        <th>JumlahPemakaian</td>
        <th>TotalBayar</td>
        <th>Status</td>
        <th style="text-align:center" colspan="2">Aksi</th>
      </tr>
      <?php 
                    $query = query("select * from tbtagihan join tbpelanggan using(NoPelanggan) where NoPelanggan='$NoPelanggan'");
                    while($hasil2 = jadiArray($query)){
                        $total = $hasil2['TotalBayar'];
                ?>
      <tr>
        <td>
          <?=$hasil2['NoTagihan'];?>
        </td>
        <td>
          <?=$hasil2['TahunTagih'];?>
        </td>
        <td>
          <?=$hasil2['BulanTagih'];?>
        </td>
        <td>
          <?=$hasil2['JumlahPemakaian'];?>
        </td>
        <td>Rp.
          <?=number_format($total,0,'.','.');?>
        </td>
        <td>
          <?php if($hasil2['Status']=='Sudah')
                        {
                            echo "<p class='hijau'>Sudah</p>";
                        }
                        else
                        {
                            echo "<p class='kuning'>Belum</p>";
                        }
                        ?>
          <?php //$hasil2['Status'];?>
        </td>
        <td>
          <a
            href="detail-tagihan.php?kode=<?= $hasil2['KodeTagihan']?>&&notagihan=<?= $hasil2['NoTagihan']?>&&nopelanggan=<?= $hasil['NoPelanggan']?>"><img
              width="30px" src="../img/detail2.png" alt=""></a>
        </td>
        <td>
          <a href="cetak.php?kode=<?= $hasil2['KodeTagihan']?>&&nopelanggan=<?= $hasil2['NoPelanggan']?>"><img
              width="30px" src="../img/cetak.png" alt=""></a>
        </td>
        <!-- <td>
                        <a href="hapus-tagihan.php?kode=<?php // $hasil2['KodeTagihan']?>">Hapus</a>
                    </td> -->
      </tr>
      <?php } ?>
    </table>
    <br>
    <form action="simpan-tagihan.php" method="post">
      <table class="sambungtable2">
        <input value="<?=$NoPelanggan; ?>" type="hidden" name="NoPelanggan" id="" required>
        <tr>
          <td>Tahun Tagih</td>
          <td><input type="text" name="TahunTagih" id="" required></td>
        </tr>
        <tr>
          <td>Bulan Tagih</td>
          <td>
            <select name="BulanTagih" id="" required>
              <option value="">-- Pilih Bulan --</option>
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Jumlah Pemakaian</td>
          <td><input type="text" name="JumlahPemakaian" id="" required></td>
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
    </form>
  </div>
  <div class="navbawah">
    <a href="index.php">Kembali Ke Pencarian Pelanggan</a>
    <br>
    <a href="index.php">Kembali Ke Halaman Utama</a>
  </div>
  <?php }
    else
    {
    ?>
  <div class="container">
    <center>
      <h1>Input Tagihan</h1>
      <hr>
    </center>
    <table border="1px" align="center" width="100%">
      <tr>
        <th>NoTagihan</td>
        <th>TahunTagih</td>
        <th>BulanTagih</td>
        <th>JumlahPemakaian</td>
        <th>TotalBayar</td>
        <th>Status</td>
        <th style="text-align:center">Aksi</th>
      </tr>
      <tr>
        <td colspan="7">
          No Pelanggan
          <?=$NoPelanggan?> Tidak Di Temukan ..
        </td>
      </tr>
    </table>
    <br>
    <form action="simpan-tagihan.php" method="post">
      <table class="sambungtable2">
        <input value="<?=$NoPelanggan; ?>" type="hidden" name="NoPelanggan" id="" required>
        <tr>
          <td>Tahun Tagih</td>
          <td><input type="text" name="TahunTagih" id="" required></td>
        </tr>
        <tr>
          <td>Bulan Tagih</td>
          <td>
            <select name="BulanTagih" id="" required>
              <option value="">-- Pilih Bulan --</option>
              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>
              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>
              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>
              <option value="Oktober">Oktober</option>
              <option value="November">November</option>
              <option value="Desember">Desember</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Jumlah Pemakaian</td>
          <td><input type="text" name="JumlahPemakaian" id="" required></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="simpan" id="" disabled>
            <input type="reset" value="hapus" id="">
          </td>
        </tr>
      </table>
    </form>
    </form>
  </div>
  <div class="navbawah">
    <a href="index.php">Kembali Ke Pencarian Pelanggan</a>
    <br>
    <a href="index.php">Kembali Ke Halaman Utama</a>
  </div>
  <?php
    }
  ?>
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