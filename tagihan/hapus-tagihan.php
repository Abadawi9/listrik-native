<?php
include '../koneksi.php';
$kode = $_GET['kode'];
$hapus = query("delete from tbtagihan where KodeTagihan='$kode'");
$query = query("select * from tbpembayaran join tbtagihan using(KodeTagihan) where KodeTagihan='$kode'");
$cek = hitungBaris($query);
if($hapus)
{
    echo "<script>
    alert('Data Berhasil Dihapus');
    location.href='index.php';
    </script>";
}
elseif($cek > 0)
{
    echo "<script>
    alert('Data GAGAL Dihapus Karena Data ini Masih Ada Relasi Di Tagihan');
    location.href='index.php';
    </script>";
}
else
{
    echo "<script>
    alert('Data GAGAL Dihapus');
    location.href='tampil-tagihan.php';
    </script>";

}