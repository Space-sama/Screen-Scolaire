<!--###################################################################################################################-->
   <!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
   <body>
     
 <center><div class="jumbotron jumbotron-fluid">
    <b><h3 id="head" >Les Tournois</b></h3>
    <b><span id='head2'>Tournois Foot entre Classes & Etablissements</span>
    </div></center>
        <?php
        
          include("Connexion.php");
          $req=$bdd->query("SELECT *
          FROM CATEGORIE_ANNONCE CA JOIN ANNONCE A ON  CA.ID_CATEGORIE = A.ID_CATEGORIE JOIN groupe g ON g.ID_GROUPE = A.ID_GROUPE 
          JOIN  filiere f ON f.ID_FILIERE = g.ID_FILIERE
          WHERE (SELECT (CA.LIBELLE='Activites' AND A.Sous_Categorie='Tournoi')  
          WHERE A.ARCHIVE=0 AND A.Date_Exp > A.DATE) ORDER BY A.ID_ANNONCE DESC LIMIT 1");
      
      while($data=$req->fetch())
      {
        $TITLE = $data['TITRE'];
        $ID_ANNONCE = $data['ID_ANNONCE'];
        $Contenu = $data['CONTENU'];
?>
<?php


$req1 =$bdd->query("SELECT A.TITRE,A.ID_ANNONCE,I.ID_IMAGE , A.CONTENU, DATE_FORMAT(A.DATE,'%d/%m/%Y') AS myDate,
DATE_FORMAT(A.Date_Exp,'%d/%m/%Y') AS myDateExp,
A.ARCHIVE, CA.LIBELLE, I.N_IMAGE FROM CATEGORIE_ANNONCE CA JOIN ANNONCE A ON  CA.ID_CATEGORIE = A.ID_CATEGORIE 
JOIN IMAGE I ON A.ID_ANNONCE = I.ID_ANNONCE JOIN groupe g ON g.ID_GROUPE = A.ID_GROUPE 
JOIN  filiere f ON f.ID_FILIERE = g.ID_FILIERE
WHERE(SELECT (CA.LIBELLE='Activites' AND A.Sous_Categorie='Tournoi')
WHERE '$ID_ANNONCE' = A.ID_ANNONCE AND A.ARCHIVE=0)  ORDER BY  myDate DESC");



  if($data1=$req1->fetchAll()){
    $DATE = $data1[0]['myDate'];
    $DATEEXP = $data1[0]['myDateExp'];
    $OneImage = base64_encode($data1[0]['N_IMAGE']);
           
?>
<div class="container container-fluid">
<div class="card text" id='cardText'>   
<div class="card-header" id='cardHeader'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span id='pub'>Publié le : </span><b><?php echo $DATE;?></b><br />

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span id='exp'>Date d'éxpiration : </span><b><?php echo $DATEEXP ?></b>
</div>
<b><h5 class="card-title" id='title'>
<?php echo $TITLE ?></h5></b>

<div class="container">
<div class="row mb-2 text-center">
        <div class="col-md-12 text-center">
            <div id="carouselExample<?php echo  $ID_ANNONCE ?>" class="carousel slide" data-ride="carousel" data-interval="3000000">

                <div class="carousel-inner row w-100 mx-auto" role="listbox" style="max-width:1000px; max-height:1000px !important;">

                    <div class="carousel-item active">
                        <img class="img-fluid mx-auto d-block" src="data:image/jpeg;base64,<?php echo $OneImage ?>" alt="<?php $data['TITRE'] ?>" width="700px" height="800px">
                    </div>
                          <?php
                          for ($x = 1; $x < sizeof($data1); $x++){
                          $img = base64_encode($data1[$x]['N_IMAGE']);
                          ?>

                    <div class="carousel-item">
                    <img class="img-fluid mx-auto d-block" src="data:image/jpeg;base64,<?php echo $img ?>" width="700px" height="800px" alt="<?php $data['TITRE'] ?>">
                    </div>
                    
                  <?php }?>
                </div>

                <a class="carousel-control-prev" href="#carouselExample<?php echo  $ID_ANNONCE ?>" role="button" data-slide="prev">

                    <i style="color:#000; text-decoration: none;" class="fa fa-chevron-circle-left fa-2x"></i>

                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next text-faded" href="#carouselExample<?php echo  $ID_ANNONCE ?>" role="button" data-slide="next">

                    <i style="color:#000; text-decoration: none;" class="fa fa-chevron-circle-right fa-2x"></i>

                    <span class="sr-only">Next</span>
                </a>

            </div>
      </div>
  </div>
</div>


<div class="card-footer text-muted" id='footerCt'>
    <center><p class="col-xs-3" id='ct'><b><?php echo $Contenu ?></b></p></center>
  </div>
</div>
                          </div>
<br />
  <?php } ?>
  <?php } ?> 

  </body>
   </html> 