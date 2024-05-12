<?php
session_start();
require_once '../config.php';

// Ellenőrizzük, hogy az űrlapot elküldték-e
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ellenőrizzük a felhasználónév és jelszó helyességét
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Ellenőrizzük az adatbázisban
        $sql = "SELECT id, username, password FROM bejelentkezes WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Sikeres bejelentkezés, beállítjuk a session változókat
                $_SESSION['user_id'] = $row['id']; // Felhasználó azonosítója
                $_SESSION['username'] = $username; // Felhasználó neve
                header('Location: ../index.php');
                exit();
            } else {
                // Hibás jelszó
                echo '<div style="background-color: #ffcccc; padding: 10px;">Hibás felhasználónév vagy jelszó!</div>';
            }
        } else {
            // Hibás felhasználónév
            echo '<div style="background-color: #ffcccc; padding: 10px;">Hibás felhasználónév vagy jelszó!</div>';
        }

        $stmt->close();
    } else {
        // Ha hiányoznak az űrlapból az adatok
        echo '<div style="background-color: #ffcccc; padding: 10px;">Hiányzó felhasználónév vagy jelszó!</div>';
    }
} else {
    // Ha nem POST kérés érkezett, valami nincs rendben
    echo '<div style="background-color: #ffcccc; padding: 10px;">Hiba történt a bejelentkezés során.</div>';
}

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>

<body>
    <div style="text-align: center;">
        <!-- Egy egyszerű vissza gomb a login.php-ra -->
        <a href="bejelentkezes.php" class="back-button">Vissza a bejelentkezéshez</a>
    </div>
</body>

</html>
