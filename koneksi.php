<?php

$konek = mysqli_connect('localhost','root','','pln');

function query($sql){
    global $konek;
    $query = mysqli_query($konek,$sql);
    return $query;
}
function jadiArray($query){
    global $konek;
    $hasil = mysqli_fetch_array($query);
    return $hasil;
}
function hitungBaris($query){
    global $konek;
    $cek = mysqli_num_rows($query);
    return $cek;
}

    function hitungBarisTarif(){
    global $konek;
    $sql = "select * from tbtarif";
    $query = mysqli_query($konek,$sql);
    $hitung = mysqli_num_rows($query);
    return $hitung;
    }
    function hitungBaristagihan(){
    global $konek;
    $sql = "select * from tbtagihan";
    $query = mysqli_query($konek,$sql);
    $hitung = mysqli_num_rows($query);
    return $hitung;
    }
    function hitungBarispelanggan(){
        global $konek;
    $sql = "select * from tbpelanggan";
    $query = mysqli_query($konek,$sql);
    $hitung = mysqli_num_rows($query);
    return $hitung;
    }
    function hitungBarispetugas(){
        global $konek;
    $sql = "select * from tblogin where Level<>'Pelanggan'";
    $query = mysqli_query($konek,$sql);
    $hitung = mysqli_num_rows($query);
    return $hitung;
    }
    function hitungBarispembayaran(){
        global $konek;
    $sql = "select * from tbpembayaran";
    $query = mysqli_query($konek,$sql);
    $hitung = mysqli_num_rows($query);
    return $hitung;
    }


?>