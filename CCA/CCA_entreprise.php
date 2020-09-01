<?php
session_start();
$GMCC =$_SESSION["GROUPE_MANAG_CCA"];
################## 404 ########################
if(!key_exists('SESSION_NOM', $_SESSION) && !key_exists('SESSION_PWD', $_SESSION)){

  header("Location: /PFA/Access/ERROR.php");

}

else if(!key_exists('PRESENT_CCA', $_SESSION)){ // breaking access for other fil

  header("Location: /PFA/Access/ERROR.php");
}
################## END 404 ########################
################## SESSION TIME ###################
if(!key_exists('SESSION_NOM', $_SESSION) && !key_exists('SESSION_PWD', $_SESSION)){

if( (time() - $_SESSION["expireTime"] > 1800)){ // 30min *60 seconds

header("Location: /PFA/Access/go_out.php");
} 
}
################## END SESSION TIME #################
################## PAGINATION ########################
include_once('../includes/connexion.php');
$limit =3;
$page = isset($_GET['page']) ? $_GET['page'] :1 ;
$start = ($page -1)  * $limit;
$message = false;
$req =$bdd->query("SELECT count(A.ID_ANNONCE) AS ID 
FROM CATEGORIE_ANNONCE CA JOIN ANNONCE A ON  CA.ID_CATEGORIE = A.ID_CATEGORIE JOIN groupe g ON g.ID_GROUPE = A.ID_GROUPE JOIN  filiere f ON f.ID_FILIERE = g.ID_FILIERE
WHERE(SELECT (CA.LIBELLE='Entreprises' AND f.NOM_FILIERE='Management' AND f.FORMATION='Cca' AND g.Classe='$GMCC')
WHERE A.ARCHIVE=0 AND A.Date_Exp > A.DATE)");

$countAnnonces = $req->fetchall();
$total_Annonces = $countAnnonces[0]['ID'];
if($total_Annonces == 0){
  $message = true;
}

$mes_Pages = ceil($total_Annonces / $limit);
$precedent = $page - 1;
$suivant = $page + 1;
################## END PAGINATION ########################
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0&appId=1153842921396868&autoLogAppEvents=1"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style1.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/ingStyle.css">
    <link rel="icon" type="image/png" href="../assets/img/n.png" />
    <link rel="stylesheet" href="../assets/css/colors.css"/>

    <title>Annonces d'Entreprises pour CCA</title>
  </head>
  <body style="background-color:#e0dedd;">


  <?php
      include('../includes/social-media.php');
      include('../includes/CCA_header.php');
    ?>


<div class="container-fluid">
<div class="row">
<div class="col-md-8">
<div class="card">
<div class="card-body" id='cardBody'>
<?php 
      if($message){
        ?>
        
          <div class="alert alert-dark alert-dismissible fade show" role="alert"><center>
            <strong>Il n'y a aucune annonce pour ce moment</strong> <br />
            <span id='thanks'>Merci d'avoir consulter votre Platform plus tard</span>🙂 </center>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
      }
  ?>
    <!--###################################################################################################################-->

   
    <?php
    include_once('../includes/connexion.php');
    $limit =3;
    $page = isset($_GET['page']) ? $_GET['page'] :1;
    $start = ($page -1)  * $limit;

    $req=$bdd->query("SELECT *
    FROM CATEGORIE_ANNONCE CA JOIN ANNONCE A ON  CA.ID_CATEGORIE = A.ID_CATEGORIE JOIN groupe g ON g.ID_GROUPE = A.ID_GROUPE 
    JOIN  filiere f ON f.ID_FILIERE = g.ID_FILIERE
    WHERE (SELECT (CA.LIBELLE='Entreprises' AND f.NOM_FILIERE='Management' AND f.FORMATION='Cca' AND g.Classe='$GMCC')  
    where A.ARCHIVE=0 AND A.Date_Exp > A.DATE) ORDER BY A.DATE DESC LIMIT $start, $limit;");
          
          while($data=$req->fetch())
          { 
            $TITLE = $data['TITRE'];
            $ID_ANNONCE = $data['ID_ANNONCE'];
            $Contenu = $data['CONTENU'];
    ?>
    <?php

    # Select only one image into  the front cover 
    $req1 =$bdd->query("SELECT f.NOM_FILIERE,f.FORMATION,A.TITRE,A.ID_ANNONCE,I.ID_IMAGE , A.CONTENU, DATE_FORMAT(A.DATE,'%d/%m/%Y') AS myDate, 
    DATE_FORMAT(A.Date_Exp,'%d/%m/%Y') AS myDate_exp, A.ARCHIVE, CA.LIBELLE, I.N_IMAGE 
    FROM CATEGORIE_ANNONCE CA JOIN ANNONCE A ON  CA.ID_CATEGORIE = A.ID_CATEGORIE JOIN IMAGE I ON A.ID_ANNONCE = I.ID_ANNONCE JOIN groupe g ON g.ID_GROUPE = A.ID_GROUPE 
    JOIN  filiere f ON f.ID_FILIERE = g.ID_FILIERE
    WHERE(SELECT (CA.LIBELLE='Entreprises' AND f.NOM_FILIERE='Management' AND f.FORMATION='Cca' AND g.Classe='$GMCC')
    WHERE '$ID_ANNONCE' = I.ID_ANNONCE AND A.ARCHIVE=0  AND A.Date_Exp > A.DATE) ORDER BY  myDate DESC");
   

      if($data1=$req1->fetchAll()){
        $DATE = $data1[0]['myDate'];
        $DATE_EXP = $data1[0]['myDate_exp'];
        $OneImage = base64_encode($data1[0]['N_IMAGE']);
            
    ?>

<div class="card text" id='cardText'>   
    <div class="card-header" id='cardHeader'>
    <span id='pub'>Publié le : </span><b><?php echo $DATE ?></b><br />
    <span id='exp'>Date expération le : </span><b><?php echo $DATE_EXP ?></b>
  </div>
  <h5 class="card-title" id='titlee'>&nbsp;&nbsp;&nbsp;<?php echo $TITLE ?></h5>
  <div class="container" id='container'>
    <div class="row mb-2 text-center">
            <div class="col-md-12 text-center">
                <div id="carouselExample<?php echo  $ID_ANNONCE ?>" class="carousel slide" data-ride="carousel" data-interval="3000000">

                    <div class="carousel-inner row w-100 mx-auto" role="listbox" style="max-width:1000px; max-height:700px !important;">

                        <div class="carousel-item active">
                            <img class="img-fluid mx-auto d-block" src="data:image/jpeg;base64,<?php echo $OneImage ?>" alt="<?php $data['TITRE'] ?>" width="1200px" height="400px">
                        </div>
                              <?php
                              for ($x = 1; $x < sizeof($data1); $x++){
                              $img = base64_encode($data1[$x]['N_IMAGE']);
                              ?>

                        <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" src="data:image/jpeg;base64,<?php echo $img ?>" width="1200px" height="400px" alt="<?php $data['TITRE'] ?>">
                        </div>
                        
                      <?php }?>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExample<?php echo  $ID_ANNONCE?>" role="button" data-slide="prev">

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


    <div class="card-footer text-muted">
        <p class="col-xs-3" style="color:rgb(70, 66, 66);"><b><?php echo $Contenu ?></b></p>
      </div>
</div>
  <hr />
      <?php } ?>
      <?php } ?> 
    <!--###################################################################################################################--> 

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="text-center">
    <a id='pagi_previous' class="page-link" href="CCA_entreprise.php?page=<?php
        if($precedent <= 0){
          echo $precedent = 1;
        } else echo $precedent;?>"  aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php 
      for($i=1; $i<=$mes_Pages; $i++) :
      ?>
       <li class="page-item"><a id='pagi_btn' class="page-link" href="CCA_entreprise.php?page=<?=$i; ?>"><?= $i ?></a></li>  
      <?php endfor;?>
      <?php
    ?>
    
   
    <li class="page-item">
      <a id='pagi_next' class="page-link" href="CCA_entreprise.php?page=<?=$suivant; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
                <!--les Annonces-->
          </div>
        </div>
        <br>
        <br>
        <br>
     </div>
              <div class="col-md-4"><br />
              <div  style="background-color:#e0dedd;">
              <h4 id='allmenu' class="card-header"><i style="color:white;" class="fa fa-bars"></i> <span id='voirAussi'>Voir aussi</span></h4>
              <a href="/PFA/CCA/CCA_administratif.php" role="button" id='allmenu' class="list-group-item list-group-item-action"> <i class="fa fa-folder-open" aria-hidden="true"></i><span id='titreMenu'> Administratif</span></a>
              <a href="/PFA/CCA/CCA_activites.php" role="button" id='allmenu' class="list-group-item list-group-item-action"> <i class="fa fa-plus-square" aria-hidden="true"></i> <span id='titreMenu'>Activités</span></a>
              <a href="/PFA/CCA/CCA_pedagogique.php" role="button" id='allmenu' class="list-group-item list-group-item-action"><i class="fa fa-archive" aria-hidden="true"></i> <span id='titreMenu'>Pédagogique</span></a>
      <?php

      include_once('../includes/connexion.php');
      $req =$bdd->query("SELECT *FROM ETUDIANT E JOIN GROUPE G ON E.ID_GROUPE = G.ID_GROUPE JOIN FILIERE F ON G.ID_FILIERE = F.ID_FILIERE 
      WHERE E.UTILISATEUR = '".$_SESSION['SESSION_NOM']."' AND E.MOT_DE_PASSE = '".$_SESSION['SESSION_PWD']."' AND G.ARCHIVE=0 AND E.ARCHIVE=0");
      while($data=$req->fetch())
      {
          $image = base64_encode($data["EMPLOI"]);
          $nom = $data['Nom'];
          $pre = $data['Prenom'];
      ?>
       <center><div id='allmenu'>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button"><span id='emploi'>Mon emploi</button> 
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-opacity w3-card-4">
      <header class="w3-container w3-teal w3-grey"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span><br />
      <strong><span id='titreMenu'>Nom & Prénom : </span></strong><b><span id='echoInfo'><?php echo $nom?></span></b>  <b><span id='echoInfo'><?php echo $pre?></span></b> &nbsp;<br /> <strong><span id='titreMenu'>Classe : </span><b><span id='echoInfo'><?php echo $data['Classe']?></span></b><br />
      <strong><span id='titreMenu'> Filière : </span><b><span id='echoInfo'><?php echo $data['NOM_FILIERE']?></span></b> &nbsp; &nbsp; &nbsp; <span id='titreMenu'>Formation: </span><b><span id='echoInfo'><?php echo $data['FORMATION']?></span></b>
      <br /> 
</header>

 <div class="w3-container">
<center><img src="data:image/jpeg;base64,<?php echo $image ?>" alt="Cover-photo" id="pic" class="img-fluid"></center>
</div>
<footer class="w3-container w3-grey">
  <p>ISGA 2O2O</p>
</footer>
</div>
</div>
</div></center>
      <?php
      }
      
      ?><br />
                    <div class="card border-light mb-3" style="max-width: 50rem;">
                    <div style="background-color:#979796;" class="card-header"><i style="color:white;" class="fa fa-hourglass-end" aria-hidden="true"></i> <span id='dateJour'>  La date d'aujourd'hui<span></div>
                    <div class="card-body text-dark">
                      <h5 class="card-title"></h5>
                      <p class="card-text">
                      <iframe  src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=medium&timezone=Africa%2FCasablanca" width="100%" height="120" frameborder="0" seamless ></iframe></p>
                    </div>
                    </div>
                     <br>
                    <div class="card border-light mb-3" style="max-width: 50rem;">
                    <div style="background-color:#979796;" class="card-header"><i style="color:white;" class="fa fa-calendar" aria-hidden="true"></i> <span id='dateJour'>CALENDRIER</span></div>
                    <div class="card-body text-dark" style="text-align: center;">
                    <p class="card-text"> 
                      <iframe name="InlineFrame1" id="InlineFrame1" style="width:200px;height:150px; text-align: center;" src="https://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=0&an=0&langue=fr&texte_color=F5F5F5&week_color=FFFFFF&week_end_color=FFFFFF&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe></p>
                    </div>
                </div>
           </div>
      </div>  
</div>

    <!---------- Footer ------------>
    <footer class="footer-bs" id='foot' style='margin-right: -16px;margin-left: -16px;'>
    <div class="row">
                <div class="col-md-4 footer-brand animated fadeInLeft">
                <h2 style="text-align:center;"> <img src="../assets/img/n.png" style="width:100px;"style="text-align:center;"></h2>
    <?php
        include('../includes/footer.php');
    ?>
  </body>
</html>