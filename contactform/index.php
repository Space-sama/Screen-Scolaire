<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.scss">
  <link rel="stylesheet" href="css/main.css">
  <link rel="icon" type="image/png" href="img/n.png" />
  <link rel="stylesheet" type="text/css" href="../assets/css/style1.css">

  <title>CONTACTEZ-NOUS</title>
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  
  <script src="validation/Parsley.js/dist/parsley.min.js"></script>
  <script src="validation/Parsley.js/dist/i18n/fr.js"></script>
</head>
<br /><br />
<body style="margin-left: auto;">
<?php include('../includes/social-media.php'); ?>
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  
  <center>
    
  <div class="wrapper">
    <h1>I S G A   -  C O N T A C T</h1>
    <br />
    <strong><p>Envoyez nous un message, et on vas vous répondre dans les meilleurs délais.</p></strong>
    <br />
    <form data-parsley-validate class="form" method="post" action="/PFA/Access/index.php" autocomplete="off">
      <input data-parsley-minlength="4" type="text" class="name"  name="nom" placeholder="Votre nom & prénom" required>
      <div>
        <p class="name-help">Entrez S'il vous plaît votre nom & prénom</p>
      </div>
      <input type="email" class="email" name="email" placeholder="Votre Email" required>
       <div>
        <p class="email-help">Entrez S'il vous plaît une adresse valide</p>
      </div>

      <textarea data-parsley-minlength="25" rows="4" cols="50" class="area" id="TextMessage" name="TextMessage" placeholder="Votre Message ici" required></textarea>
        
       <div>
        <p class="area-help">Ecrivez votre message</p>
      </div>
    

      <input type="submit" class="submit" value="Envoyer" name="Register">
    </form>
  </div>
  
  </center>

  <script>
    $(".name").focus(function(){
      $(".name-help").slideDown(500);
    }).blur(function(){
      $(".name-help").slideUp(500);
    });
    
    $(".email").focus(function(){
      $(".email-help").slideDown(500);
    }).blur(function(){
      $(".email-help").slideUp(500);
    });

    $(".area").focus(function(){
      $(".area-help").slideDown(500);
    }).blur(function(){
      $(".area-help").slideUp(500);
    });

    
      </script>
      
   
</body>
</html>