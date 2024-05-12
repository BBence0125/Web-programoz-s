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
    <title>Autók listája</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BJCars</a>
   <a class="btn btn-primary" href="../index.php">Főoldal</a>
  </div>
</nav>
    <h2>Autók listája</h2>
    <div class="container">
        <div class="row">
            <?php
            
            include '../config.php';

            // Autók lekérdezése az adatbázisból
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['brand'] . ' ' . $row['model']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['brand'] . ' ' . $row['model']; ?></h5>
                                <p class="card-text">Évjárat: <?php echo $row['year']; ?><br>Ár: <?php echo $row['price']; ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Nincs találat az adatbázisban.";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
