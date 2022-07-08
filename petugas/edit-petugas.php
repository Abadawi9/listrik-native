<?php 
session_start();
if(isset($_SESSION['Admin']))
{
include '../koneksi.php';
$kode = $_GET['kode'];
$query = query("select * from tblogin where KodeLogin='$kode'");
$hasil = jadiArray($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Petugas</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<?php include "../navbar.php"; ?>
    <div class="container">
        <center>
            <h1>Edit Petugas</h1>
            <hr>
        </center>
        <table class="tengah">
            <form action="proses-edit-petugas.php" method="post">
                    <input type="hidden" name="KodeLogin" id="" value="<?=$hasil['KodeLogin'];?>" required>
                <tr>
                    <td>Username</td>
                    
                    <td><input type="text" name="Username" id="" value="<?=$hasil['Username'];?>" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    
                    <td><input type="text" name="Password" id="" value="<?=$hasil['Password'];?>" required></td>
                </tr>
                <tr>
                    <td>NamaLengkap</td>
                    
                    <td><input type="text" name="NamaLengkap" id="" value="<?=$hasil['NamaLengkap'];?>" required></td>
                </tr>
                <tr>
                    <td>Level</td>
                    
                    <td>
                        <select name="Level" id="" required>
                            <?php 
                        if($hasil['Level'] == 'Admin')
                        {
                        ?>
                            <option value="">-- pilih petugas --</option>
                            <option value="Admin" selected>Admin</option>
                            <option value="Petugas">Petugas</option>
                            <?php 
                        }
                        else
                        {
                        ?>
                            <option value="">-- pilih petugas --</option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas" selected>Petugas</option>
                            <?php
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="edit" id="">
                        <input type="reset" value="reset" id="">
                    </td>
                </tr>
            </form>
        </table>
    </div>
    <div class="navbawah">
        <br>
        <a onclick="return confirm('tidak jadi edit ??')" href="index.php">Kembali Ke Input Petugas</a>
        <br>
        <a onclick="return confirm('tidak jadi edit ??')" href="../home.php">Kembali Ke Menuutama</a>
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