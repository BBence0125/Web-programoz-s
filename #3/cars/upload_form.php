<?php
session_start();
require_once '../config.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: ../bejelentkezes/bejelentkezes.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Autó feltöltése</title>
</head>
<body>
    <h2>Autó feltöltése</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-4">
        <strong>Márka:</strong> <input type="text" class="form-control" name="brand"><br>
        <strong>Modell:</strong> <input type="text" class="form-control" name="model"><br>
        <strong>Évjárat:</strong> <input type="number" class="form-control" name="year"><br>
        <strong>Ár:</strong> <input type="number" class="form-control" name="price"><br>
        <strong>Kép feltöltése:</strong> <input type="file"  name="image"><br>
        <input type="submit" class="btn btn-primary" value="Feltöltés">
    </form>
</body>
</html>
