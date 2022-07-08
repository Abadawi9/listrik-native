<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Pembayaran Listrik</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="kotak">
    <img width="200px" src="img/user.png" alt="">
    <form action="proses-login.php" method="post">
      <table align="center">
        <tr>
          <td>Username</td>
          <td>:</td>
          <td><input type="text" name="Username" id="" required></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="password" name="Password" id="" required></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <input type="submit" value="login" id="">
            <input type="reset" value="hapus" id="">
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>