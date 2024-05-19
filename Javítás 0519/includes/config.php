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

$conn = new mysqli($servername, $username, $password, $dbname);

$menu = array(
    '/' => array('fajl' => 'index', 'szoveg' => 'Főoldal', 'menun' => array(0,1)),
    'cars' => array('fajl' => 'cars', 'szoveg' => 'Autók', 'menun' =>array(1,1)),
    'upload_form' => array('fajl' => 'upload_form', 'szoveg' => 'Autók feltöltés', 'menun' =>array(1,1)),
    'urlap' => array('fajl' => 'urlap', 'szoveg' => 'Üzeneteid', 'menun' =>array(1,1)),
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Kapcsolat', 'menun' =>array(1,1)),
    'register' => array('fajl' => 'register', 'szoveg' => 'Regisztráció', 'menun' =>array(1,1)),
    'bejelentkezes' => array('fajl' => 'bejelentkezes', 'szoveg' => 'Bejelentkezés', 'menun' =>array(0,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' =>array(0,0)),
    'torles' => array('fajl' => 'torles', 'szoveg' => 'Törlés', 'menun' =>array(0,0)),
    'upload' => array('fajl' => 'upload', 'szoveg' => 'Autók feltöltés', 'menun' =>array(0,0)),
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>