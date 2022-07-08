<?php 
session_start();
if(isset($_SESSION['Admin']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <?php include "../navbar.php"; ?>
    <div class="container">
        <center>
            <h1>Input Petugas</h1>
            <hr>
        </center>
        <table class="tengah">
            <form action="simpan-petugas.php" method="post">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="Username" id="" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Password" id="" required></td>
                </tr>
                <tr>
                    <td>NamaLengkap</td>
                    <td><input type="text" name="NamaLengkap" id="" required></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="Level" id="" required>
                            <option value="">-- pilih petugas --</option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="simpan" id="">
                        <input type="reset" value="reset" id="">
                    </td>
                </tr>
            </form>
        </table>
    </div>
    <div class="navbawah">
        <a href="tampil-petugas.php">Lihat Data Petugas</a>
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