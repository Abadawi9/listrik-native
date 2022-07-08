<?php if(isset($_SESSION['Admin'])){ ?>
<div class="nav">
  <div class="menu">
    <br>
    <a href="home.php">
      <img src="img/logo.png" alt="">
    </a>
    <br>
    <li><a href="petugas/index.php">Input Petugas</a></li>
    <li><a href="tarif/index.php">Input Tarif</a></li>
    <li><a href="pelanggan/index.php">Input Pelanggan</a></li>
    <li><a href="tagihan/index.php">Input Tagihan</a></li>
    <li><a href="pembayaran/index.php">Input Pembayaran</a></li>
    <li><a href="logout.php">Logout</a></li>
  </div>
</div>
<div class="nav2">
  <div class="penamaan">
    <p>Nama Lengkap :
      <?= $_SESSION['NamaLengkap']; ?>
    </p>
  </div>
  <div class="level">
    <p>Level : Admin</p>
  </div>
</div>
<?php
}
elseif(isset($_SESSION['Petugas']))
{
?>
<div class="nav">
  <div class="menu">
    <br>
    <img src="img/logo.png" alt="">
    <br>
    <li><a href="tarif/index.php">Input Tarif</a></li>
    <li><a href="pelanggan/index.php">Input Pelanggan</a></li>
    <li><a href="tagihan/index.php">Input Tagihan</a></li>
    <li><a href="pembayaran/index.php">Input Pembayaran</a></li>
    <li><a href="logout.php">Logout</a></li>
  </div>
</div>
<div class="nav2">
  <div class="penamaan">
    <p>Nama Lengkap :
      <?= $_SESSION['NamaLengkap']; ?>
    </p>
  </div>
  <div class="level">
    <p>Level : Petugas</p>
  </div>
</div>
<?php    
}
else
{
?>
<div class="nav">
  <div class="menu">
    <br>
    <img src="img/logo.png" alt="">
    <br>
    <li><a href="tagihan/index.php">Input Tagihan</a></li>
    <li><a href="pembayaran/index.php">Input Pembayaran</a></li>
    <li><a href="logout.php">Logout</a></li>
  </div>
</div>
<div class="nav2">
  <div class="penamaan">
    <p>Nama Lengkap :
      <?= $_SESSION['NamaLengkap']; ?>
    </p>
  </div>
  <div class="level">
    <p>Level : Pelanggan</p>
  </div>
</div>
<?php
}
?>