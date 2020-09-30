<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/n.png" />
    <link rel="stylesheet" href="assets/css/colors.css"/>
    
    <title>ISGA-Platform d'affichage</title>
    <!-- <script src="https://www.vantajs.com/dist/vanta.birds.min.js"></script> -->

  </head>

  <body style="background-color: #e0dedd; margin-left: -16px;">
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">&nbsp;&nbsp;&nbsp;
  <a class="navbar-brand" href="index.php"><img src="assets/img/isga.png "style="width:70px;display:block;margin-right:auto;margin-left: auto;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php 
  include('includes/social-media.php');
  include("includes/header-index.php"); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/ingnierie.jpg" class="d-block w-100" alt="bleu">
      <div class="carousel-caption d-none d-md-block">
        <h5>ISGA 2O2O</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/iga.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>ISGA 2O2O</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/Espace-tudiant.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br /><br /><br />

  <!--<div id="content_holder">
  <div class="title">
  <center><h1>Bienvenue a la plateforme d'affichage</h1></center>
  </div>-->
	
  <div class="container">
    <center><h1 id='bf'> Bienvenue a la platform d'affichage</h1></center>
      
      
      <center><strong><h2 id='vp' >Votre plateform idéale pour les informations</h2></strong></center>
      
    
    
  </div><br /><br />
 
          



<?php

        include('includes/AnnoncesPourTous/Tournois.php');
        include('includes/AnnoncesPourTous/Visites.php');
        include('includes/AnnoncesPourTous/SemaineCul.php');
        include('includes/AnnoncesPourTous/Conferences.php');

?>                                   
      <br /><br /><br />
      <div class="container">
    <center><h1 id='isga'><span id='triangle'>🎓</span>ISGA - RABAT<span id='triangle'>🎓</span></h1></center>
      
 
      <center><strong><h2 id='vp'>N'hésitez pas de Visitez Nos Centres</h2></strong></center>
      <!--<center><embed type="image/svg+xml" src="/PFA/assets/img/Triangles-2.svg"/></center>-->
      <a href="https://isga.ma/groupeisga/campus-isga/ecole-marocaine-casablanca" target="_blank" role="button" class="btn btn-outline-dark btn-lg btn-block"><span id="aller">🔻 aller vers la page des autres centres 🔺</span></a>
    
    
  </div><br /><br />
      


    
</div>
<div><br /><br />

<!---------- FOOTER ------------>
<?php 
?>
<footer class="footer-bs" id='foot'>
<div class="row">
            <div class="col-md-4 footer-brand animated fadeInLeft">
            <center><img src="assets/img/n.png" style="width:100px;"style="text-align:center;"></center><br />
            <!--<center><embed type="image/svg+xml" src="/PFA/assets/img/Triangles-2.svg"/></center>-->

<?php
include("includes/footer.php"); 
?>

  </body>
</html>

