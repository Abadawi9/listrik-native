<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']))
{
    include '../koneksi.php';
    $kode = $_GET['kode'];
    $query = query("select * from tbtagihan join tbpelanggan using(NoPelanggan) where KodePelanggan='$kode'");
    $query2 = query("select * from tbpelanggan where KodePelanggan='$kode'");
    $hasil = hitungBaris($query2);
    $cek = hitungBaris($query);

    if($cek> 0)
    {
        echo "<script>
        alert('Data GAGAL Dihapus Karena Data ini Masih Ada Relasi Di Tagihan');
        location.href='tampil-pelanggan.php';
        </script>";
    }
    else {

        $hapus = mysqli_query($konek, "delete from tbpelanggan where KodePelanggan='$kode'");
        if($hapus)
        {
            $Username = $hasil['NoPelanggan'];
            mysqli_query($konek, "delete from tblogin where Username='$Username'");

            echo "<script>
            alert('Data Berhasil Dihapus');
            location.href='tampil-pelanggan.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Data GAGAL Dihapus');
            location.href='tampil-pelanggan.php';
            </script>";

        }
    }
}
else
{
    echo"<script>
    alert('Anda Tidak Boleh Masuk');
    location.href='../home.php';
    </script>";
}