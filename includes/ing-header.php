<link rel="stylesheet" type="text/css" href="css/ingStyle.css">
<link rel="stylesheet" type="text/css" href="css/managStyle.css">
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand"href="/PFA/ingenieur/"><img src="img/isga.png "style="width:70px;display:block;margin-right:auto;margin-left: auto;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/PFA/ingenieur/"> 
          <i class="fa fa-home" aria-hidden="true"></i>ACCUEIL<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://isga.ma/actualites-groupe-isga" target="_blank"> <i class="fa fa-plus-circle" aria-hidden="true"> </i> <span class="sr-only"></span>Actualités</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://isga.ma/groupe-isga/qui-sommes-nous" target="_blank"> <i class="fa fa-comment-o" aria-hidden="true"></i> <span class="sr-only"></span>À propos de nous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/PFA/contactform/" target="_blank"> <i class="fa fa-phone" aria-hidden="true"></i> <span class="sr-only"></span> Contactez Nous</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="color: white;" class="mr-2 d-none d-lg-inline text-grey-600"><?php echo  $_SESSION["SESSION_NOM"]." ".$_SESSION["SESSION_PRENOM"]; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
                <a class="dropdown-item" href="parametre.php?id=<?php echo $_SESSION["SESSION_ID"];?>">
                  <i class="fa fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i> Mon profile</a>
                <div class="dropdown-divider"></div>
                <a style="color: red;" class="dropdown-item" href="/PFA/Access/go_out.php">
                <i style="font-size: 15px; color:red;" class="fa fa-power-off" aria-hidden="true"></i> Se Déconnecter</a>
              </div>
            </li>
</ul>
  </div>
</nav>