<?php 
include '../koneksi.php';

$KodeTagihan = $_POST['KodeTagihan'];
$Status = $_POST['Status'];

query("update tbpembayaran set Status='$Status' where KodeTagihan='$KodeTagihan'");
query("update tbtagihan set Status='$Status' where KodeTagihan='$KodeTagihan'");

echo "<script>
    alert('Pembayaran Sudah Di Set');
    location.href='index.php';
    </script>";

?>