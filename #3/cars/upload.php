<?php
session_start();
require_once '../config.php'; 

// Adatok begyűjtése az űrlapról
$brand = $_POST['brand'];
$model = $_POST['model'];
$year = $_POST['year'];
$price = $_POST['price'];

// Képfeltöltés feldolgozása
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Ellenőrizzük, hogy a fájl valóban egy kép-e
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
    echo "A fájl egy kép - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "A fájl nem kép.";
    $uploadOk = 0;
}

// Ellenőrizzük, hogy a fájl már létezik-e
if (file_exists($target_file)) {
    echo "A fájl már létezik.";
    $uploadOk = 0;
}

// Ellenőrizzük a fájlméretet
if ($_FILES["image"]["size"] > 5000000) { // Maximum 5MB
    echo "A fájl túl nagy.";
    $uploadOk = 0;
}

// Ellenőrizzük a fájltípust
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
if (!in_array($imageFileType, $allowed_types)) {
    echo "Csak JPG, JPEG, PNG & GIF fájlok engedélyezettek.";
    $uploadOk = 0;
}

// Ha minden rendben van, mentjük az adatokat az adatbázisba és a képet a mappába
if ($uploadOk == 0) {
    echo "Sajnáljuk, a fájl nem lett feltöltve.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "A fájl ". basename( $_FILES["image"]["name"]). " sikeresen feltöltve.";

        // Az adatok mentése az adatbázisba
        $image = basename($_FILES["image"]["name"]);
        $sql = "INSERT INTO cars (brand, model, year, price, image) VALUES ('$brand', '$model', '$year', '$price', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "Az adatok sikeresen mentve az adatbázisba.";
            // Gomb az Autók oldalra
            echo '<form action="cars.php"><input type="submit" value="Autók" class="btn btn-primary"></form>';
        } else {
            echo "Hiba: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sajnáljuk, hiba történt a fájl feltöltése közben.";
    }
}

$conn->close();
?>
