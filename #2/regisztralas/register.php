<?php
session_start();
require_once '../config.php'; // Az adatbázis kapcsolatot tartalmazó fájl elérési útja
if (isset($_SESSION['username'])) {
    echo '<div style="background-color: rgba(40, 175, 211, 0.5); padding: 20px; color: white; text-align: center; font-size: 24px;">Már be vagy regisztrálva!<br><br><a href="../index.php" style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Vissza a főoldalra</a></div>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Felhasználótól kapott adatok feldolgozása
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ellenőrizzük, hogy a felhasználónév és az e-mail egyediek legyenek
    $stmt = $conn->prepare("SELECT id FROM bejelentkezes WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Ha a felhasználónév vagy az e-mail már foglalt, hibaüzenet
        echo "A felhasználónév vagy az e-mail már foglalt.";
        exit();
    }

    // Jelszó hashelése
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Felhasználó létrehozása
    $stmt = $conn->prepare("INSERT INTO bejelentkezes (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // Sikeres regisztráció után irányítás a bejelentkezési oldalra
        header("Location: ../bejelentkezes/bejelentkezes.php");
        exit();
    } else {
        echo "Hiba történt a regisztráció során.";
    }

    $stmt->close();
}
?>




<!DOCTYPE html>
<html lang="hu">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    
</head>
<body>
<div id="container">
</div>
    <div class="content">
    <h1>Regisztráció</h1>
    <br>
    <form action="../regisztralas/register.php" method="post">
        <div class="form-row">
            <div class="col-4">
            <label for="username">Felhasználónév:</label>
            <input type="text" class="form-control" id="username" placeholder="Írjon be egy felhasználónevet" name="username" required>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-4">
            <label for="email">E-mail cím:</label>
            <input type="email" class="form-control" id="email" placeholder="Írja be az e-mail címét" name="email" required>
            </div>
        </div>
        <br>
            <div class="form-row">
                <div class="col-4">
            <label for="password">Jelszó:</label>
            <input type="password" class="form-control" id="password" placeholder="Írjon be egy jelszót" name="password" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="register">Regisztráció</button>
        </form>
</div>
</body>
</html>
