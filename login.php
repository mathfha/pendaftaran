<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="style_login.css">
</head>
<body>
  <div style="color:white; position:absolute; left:590px; top:120px; font-size:30px; background-color:black;">
  </div>

  <div class="container">
    <h1>Login Admin</h1>
    <form method="post" action="cek_login.php">
      <label for="user">Username</label>
      <input type="text" name="user" id="user" required>

      <label for="pass">Password</label>
      <input type="password" name="pass" id="pass" required>

      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>
