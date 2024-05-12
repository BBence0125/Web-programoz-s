<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BJCars-Autókereskedés</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BJCars</a>
    <?php
include 'header.php';
?>
  </div>
</nav>
<!-- Hero -->
<div id="container">
<?php
if (isset($_SESSION['username'])) {
  echo"<p></p>";
    echo "<p>Üdvözöllek, " . $_SESSION['username'] . "!</p>";
} else {
    echo "<p>Üdvözöllek Vendég! Kérlek jelentkezz be, vagy regisztrálj az oldalra a további tartalmak eléréséhez!</p>";
}
?> 
</div>
<div class="p-5 text-center bg-image rounded-3" style="
    background-image: url('hero_pic.jpg');
    height: 100%;
    background-size: cover;
    height:100%;
  ">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Üdvözöljük az Autóvilágban!</h1>
        <h4 class="mb-3">Fedezze fel legújabb autóinkat és szolgáltatásainkat!</h4>
        <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="cars/cars.php" role="button">Vásárlás</a>
        <br>
        <br>
     
        <section id="videos">
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="display: flex; justify-content: left;">
                <video controls width="100%" height="365px">
                    <source src="video/video.mp4" class="object-fit-scale" type="video/mp4" autoplay>
                    A böngésződ nem támogatja a videót.
                </video>
            </div>
            <div class="col-md-6" style="display: flex; justify-content: right;">
                <iframe width="100%" height="365px" src="https://www.youtube.com/embed/VWrJkx6O0L8"></iframe>
                  <br>
            </div>
            <div class="col-md-12 text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3375296155727!2d19.66695091525771!3d46.89607994478184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sPallasz+Ath%C3%A9n%C3%A9+Egyetem+GAMF+Kar!5e0!3m2!1shu!2shu!4v1475753185783" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>


<br>
<br>
        
        </section>
      </div>
    </div>
  </div>
</div>
<!-- Hero -->


    
</body>
</html>