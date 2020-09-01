<?php
################## 404 ########################
session_start();
$onlyOneStudent = $_SESSION["SESSION_ID"];
$id=$_GET['id'];
if(!key_exists('SESSION_NOM', $_SESSION) && !key_exists('SESSION_PWD', $_SESSION))
{
  header("Location: /PFA/Access/ERROR.php");
}
else if($_SESSION["SESSION_ID"] != $id){  // breaking access for other fil
header("Location: /PFA/ingenieur/parametre.php?id=$onlyOneStudent");

}
################## END 404 ########################
################## SESSION TIME ###################
if(isset($_SESSION['SESSION_NOM']) && isset($_SESSION['SESSION_PWD'])){
if( (time() - $_SESSION["expireTime"] > 1800)){ // 30min *60 seconds

header("Location: /PFA/go_out.php");
} 
}
################## END SESSION TIME ##############

################## EDIT PROFILE ##################

include_once('../includes/connexion.php');
$req=$bdd->query("SELECT *FROM ETUDIANT WHERE ID_ETUDIANT = $id");
while($donne = $req->fetch())
{
    $USER = $donne["UTILISATEUR"];
    $PWD = $donne["MOT_DE_PASSE"];
    
}
################## END EDIT PROFILE ##############

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/profile-ingStyle.css">
    <link rel="icon" type="image/png" href="../assets/img/n.png" />
    <script src="bootstrap.min.js"></script>

    <title>Paramètre</title>
</head>
<body style="background-color: #222">
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="/PFA/ingenieur/index.php"><img src="img/isga.png "style="width:70px;display:block;margin-right:auto;margin-left: auto;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/PFA/ingenieur/index.php"> 
          <i class="fa fa-home" aria-hidden="true"></i> ACCUEIL<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="https://isga.ma/actualites-groupe-isga" target="_blank"> <i class="fa fa-plus-circle" aria-hidden="true"> </i> <span class="sr-only"></span> Actualités</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="https://isga.ma/groupe-isga/qui-sommes-nous" target="_blank">  <i class="fa fa-comment-o" aria-hidden="true"></i> <span class="sr-only"></span> À propos de nous</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="/PFA/contactform/" target="_blank"> <i class="fa fa-phone" aria-hidden="true"></i> <span class="sr-only"></span> Contactez Nous</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a href="/PFA/ingenieur/" class="btn btn-outline-primary my-2 my-sm-0"><i class="fa fa-home" aria-hidden="true"></i> Retour à la page d'acceuil</a>
    </form>

  </div>
</nav>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                <p  class="card-header" class="h5"><i class="fa fa-cogs" aria-hidden="true"></i>
                        Paramètres généraux </p>
                        <strong><p style="color: red; font-size: 20px; font-family: 'OpenSans-italic';" id="em"></strong></p>
                    <div class="px-2">
                    <center>
                            <p name="pl" style="color:green;"></p>
                            </center>
                        <form action="" method="post" id="form" class="justify-content-center">
                            <div class="form-group">
                        <label name="error"></label>
                                <input type="text" id="user" name="user" class="form-control" value="<?php echo htmlspecialchars("$USER")?>" placeholder="Nouveau nom">
                            </div>
                            <div class="form-group">
                            <i class="fa fa-key" aria-hidden="true"></i>  Changer le mot de passe </p>
                                <input type="text" id="pwd" name="p1" class="form-control" value="<?php echo htmlspecialchars("$PWD")?>"   placeholder="Nouveau mot de pass"><br />
                                <input type="text" id="pwd1" name="p2" class="form-control" value="<?php echo htmlspecialchars("$PWD")?>"  placeholder="Retapez le mot de pass">
                            </div>
                            <button name="edit" class="btn btn-primary btn-lg">Enregistrer vos informations</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php 
    include_once('../includes/connexion.php');
    if(isset($_POST["edit"])){
      $res=$bdd->query("UPDATE ETUDIANT E set E.UTILISATEUR = '$_POST[user]', E.MOT_DE_PASSE='$_POST[p1]' WHERE E.ID_ETUDIANT='$id'" ); 
    if($res){ 
      echo'<script>
      alert("Vos cordonnées a été bien modifiés!");
      </script>';
      echo '<script>window.location.href ="/PFA/ingenieur/";</script>';
    }
  else 
  echo'<script> alert("Un problème a été serveunu!");</script>';
        
  
}

?>
<script src="js/profile.js"></script>
</html>