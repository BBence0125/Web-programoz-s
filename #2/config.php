<?php

$servername = "localhost";
$username = "bjcarss";
$password = "cehjyt-9xavxu-Xekhyh";
$dbname = "bjcarss";

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bjcarss";
*/

$menu = array(
    'Főoldal' => 'index.php',
    'Autók' => './cars/cars.php',
    'Autók Feltöltése' => './cars/upload_form.php',
    'Kapcsolat' => './urlap/urlap.php',
    'Üzeneteid' => './urlap/uzenetek.php',
    'Regisztráció' => './regisztralas/register.php',
);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>