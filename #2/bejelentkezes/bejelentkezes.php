<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<div style="background-color: rgba(255, 0, 0, 0.5); padding: 20px; color: white; text-align: center; font-size: 24px;">Már be vagy jelentkezve!<br><br><a href="../index.php" style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Vissza a főoldalra</a></div>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>
<body>


<h1>Bejelentkezés</h1>
<form action="login_handler.php" method="POST">
  <div class="form-row" >
    <div class="col-4">
    <label for="username">Felhasználónév</label>
    <input type="text"  class="form-control"  id="username"  placeholder="Írja be a felhasználónevét"  name="username" >
    </div>
  </div>
  <br>
  <div class="form-row">
    <div class="col-4">
    <label for="password">Jelszó</label>
    <input type="password" class="form-control" id="password" placeholder="Jelszó" name="password">
    </div>
  </div>
  <br> 
  <button type="submit" class="btn btn-primary">Bejelentkezés</button>
</form>
</body>
</html>
