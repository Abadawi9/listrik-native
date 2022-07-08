<?php

include '../koneksi.php';
$Huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$NoTagihan = substr(str_shuffle($Huruf),0,6);
$NoPelanggan = $_POST['NoPelanggan'];
$TahunTagih = $_POST['TahunTagih']; 
$BulanTagih = $_POST['BulanTagih']; 
$JumlahPemakaian = $_POST['JumlahPemakaian'];
$sql = "select * from tbtagihan where NoTagihan='$NoPelanggan' And NoPelanggan='$NoPelanggan' And TahunTagih='$TahunTagih' And BulanTagih='$BulanTagih'";
$query = query($sql);
$cek = hitungBaris($query);
if($cek > 0)
{
    echo "<script>
    alert('Tidak Bisa Karena Bulan Tersebut Sudah Ada Tagihannya !');
    location.href='index.php';
    </script>";
}
else
{
    function cariTotalBayar($JumlahPemakaian)
    {   
        $NoPelanggan = $_POST['NoPelanggan'];
        $query = query("select * from tbpelanggan join tbtarif using(KodeTarif) where NoPelanggan='$NoPelanggan'");
        $hasil = jadiArray($query);
        $tarif = $hasil['TarifPerKwh'];
        $beban = $hasil['Beban'];
        $TotalHarga = ($JumlahPemakaian * $tarif) + $beban;
        return $TotalHarga;
    }

    $TotalHarga = cariTotalBayar($JumlahPemakaian);
    $Status = "Belum";
    $simpan = mysqli_query($konek, "insert into tbtagihan (NoTagihan, NoPelanggan, 	TahunTagih, BulanTagih, JumlahPemakaian, TotalBayar, Status) 
        Values('$NoTagihan','$NoPelanggan','$TahunTagih','$BulanTagih','$JumlahPemakaian','$TotalHarga','$Status')");
    
    if($simpan)
    {
        echo "<script>
        alert('Data Berhasil Disimpan');
        location.href='index.php';
        </script>";
    }
    else
    {   

        // var_dump(mysqli_error($konek));
        // die();

        echo "<script>
        alert('Data GAGAL Disimpan');
        location.href='index.php';
        </script>";
    }
}

?>