<?php
session_start();
include 'koneksi.php';
if(isset($_SESSION['Admin']))
{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Halaman Pembayaran Listrik Pasca Bayar</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php include "navhome.php"; ?>
		<div class="container">
			<center>
			<h1>Halaman Pembayaran Listrik Pasca Bayar</h1>
			<hr style="width:700px">
			</center>
			<br>
			<table align="center" border="1px" width="100%">
				<tr>
					<td colspan="6">
						<center><span>Menu</span></center>
					</td>
				</tr>
				<tr align="center">
					<td><a class href="petugas/index.php">Input Petugas</a></td>
					<td><a href="tarif/index.php">Input Tarif</a></td>
					<td><a href="pelanggan/index.php">Input Pelanggan</a></td>
					<td><a href="tagihan/index.php">Input Tagihan</a></td>
					<td><a href="pembayaran/index.php">Input Pembayaran</a></td>
					<td><a href="logout.php">Logout</a></td>
				</tr>
				<?php
					$tarif = hitungBarisTarif();
					$petugas = hitungBarisPetugas();
					$pelanggan = hitungBarisPelanggan();
					$tagihan = hitungBaristagihan();
					$pembayaran = hitungBarispembayaran();
				//     ?>
				<tr align="center">
					<td>Jml. Data Tarif :
						<?= $tarif?>
					</td>
					<td>Jml. Data Petugas :
						<?= $petugas?>
					</td>
					<td>Jml. Data Pelanggan :
						<?= $pelanggan?>
					</td>
					<td>Jml. Data Tagihan :
						<?= $tagihan?>
					</td>
					<td colspan="2">Jml Data Pembayaran :
						<?= $pembayaran?>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
<?php
}
elseif(isset($_SESSION['Petugas']))
{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Halaman Pembayaran Listrik Pasca Bayar</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php include "navhome.php"; ?>
		<div class="container">
			<center>
			<h1>Halaman Pembayaran Listrik Pasca Bayar</h1>
			<hr>
			</center>
			<br>
			<table align="center" border="1px" width="100%">
				<tr>
					<td colspan="6">
						<center>Menu</center>
					</td>
				</tr>
				<tr align="center">
					<td><a href="tarif/index.php">Input Tarif</a></td>
					<td><a href="pelanggan/index.php">Input Pelanggan</a></td>
					<td><a href="tagihan/index.php">Input Tagihan</a></td>
					<td><a href="pembayaran/index.php">Input Pembayaran</a></td>
					<td><a href="logout.php">Logout</a></td>
				</tr>
				<?php
					
					$tarif = hitungBarisTarif();
					$petugas = hitungBarisPetugas();
					$pelanggan = hitungBarisPelanggan();
					$tagihan = hitungBaristagihan();
					$pembayaran = hitungBarispembayaran();
				//     ?>
				<tr align="center">
					<td>Jml. Data Tarif :
						<?= $tarif?>
					</td>
					<td>Jml. Data Pelanggan :
						<?= $pelanggan?>
					</td>
					<td>Jml. Data Tagihan :
						<?= $tagihan?>
					</td>
					<td colspan="2">Jml Data Pembayaran :
						<?= $pembayaran?>
					</td>
				</tr>
			</table>
		</body>
	</html>
	<?php
			}
			elseif(isset($_SESSION['Pelanggan']))
			{
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>Halaman Pembayaran Listrik Pasca Bayar</title>
			<link rel="stylesheet" href="style.css">
		</head>
		<body>
			<?php include 'navhome.php'; ?>
			<div class="container">
				<center>
				<h1>Halaman Pembayaran Listrik Pasca Bayar</h1>
				<hr style="width:700px;">
				</center>
				<br>
				<table align="center" border="1px" width="100%">
					<tr>
						<td colspan="6">
							<center>Menu</center>
						</td>
					</tr>
					<tr align="center">
						<td><a href="tagihan/index.php">Input Tagihan</a></td>
						<td><a href="pembayaran/index.php">Input Pembayaran</a></td>
						<td><a href="logout.php">Logout</a></td>
					</tr>
				</table>
			</div>
		</body>
	</html>
	<?php
	}
	else
	{
	echo"<script>
	alert('Anda Tidak Boleh Masuk');
	location.href='index.php';
	</script>";
	}
	?>