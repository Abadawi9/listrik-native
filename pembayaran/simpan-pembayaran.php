<?php
session_start();
if(isset($_SESSION['Admin']) || isset($_SESSION['Petugas']) || isset($_SESSION['Pelanggan']))
{
    include '../koneksi.php';
    $KodeTagihan = $_POST['KodeTagihan'];
    $TglBayar = $_POST['TglBayar'];
    $JumlahTagihan = $_POST['JumlahTagihan'];
    $BuktiPembayaran = $_POST['BuktiPembayaran'];
    $Status = "Sudah";

    $simpan = mysqli_query($konek, "insert into tbpembayaran (KodeTagihan, TglBayar, JumlahTagihan, BuktiPembayaran, Status) values('$KodeTagihan','$TglBayar','$JumlahTagihan','$BuktiPembayaran','$Status')");

    if($simpan)
    {   

        //------ update Tagihan jadi lunas
        $sql = "UPDATE tbtagihan SET Status='Sudah' WHERE KodeTagihan='$KodeTagihan'";
        mysqli_query($konek, $sql);

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
else
{
    echo"<script>
    alert('Anda Tidak Boleh Masuk');
    location.href='../home.php';
    </script>";
}
?>