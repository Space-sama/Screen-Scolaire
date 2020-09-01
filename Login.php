<?php
session_start();

if(key_exists('login', $_SESSION) && $_SESSION['login'] == true) 
{ 

    

   
  echo "<script>window.location.href='Access/ERROR.php'</script>";


}
else
{
  
  
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ISGA</title>
    <link rel="icon" type="image/png" href="assets/img/n.png" />
    <link rel="stylesheet" href="assets/css/styleLoginForm.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    
  </head>



  <body>
      <form action="logincode.php" method="POST" class="login-form" id="form">
      <pre  id="parag" style="color: red; font-size: 20px; font-family: 'OpenSans-italic'; text-align: center;"></pre>
      
        <h1>Bienvenue!</h1>
      
          <a href="/PFA" target="_blank" title="ISGA Acceuil">
            <img class="myimg" src="assets/img/isga.png" width="280" height="110" style="opacity:.8;" >
          </a>
                      <!--#################### Login User ##############################-->
        <div class="txtb">
          <input type="text" name="Utilisateur" id="Utilisateur" value="<?php if(key_exists('LoginUser', $_COOKIE)) 
          {   echo  $_COOKIE["LoginUser"];    }?>">

          <span data-placeholder="Votre nom"></span>
        </div>
                      <!--################## END Login User ###########################-->

                      <!--##################  Login Password ###########################-->
        <div class="txtb">
          <input type="password" name="password" id="password"   value="<?php if(key_exists('PassUser', $_COOKIE)) 
          {   echo  $_COOKIE["PassUser"];    }?>">

          <span data-placeholder="Votre mot de passe"></span>
        </div>
                      <!--######################## END Login Password ##########################-->

          <input type="checkbox" name="rm">
          <label style="color:whitesmoke;" for="rm">&nbsp;&nbsp;Mémoriser mes informations</label></div><hr /><br />


          
        <input type="submit" name="login_btn" class="logbtn" value="Connecter"> 
    <em ><?php 
          if(key_exists('error', $_SESSION)) 
            { 
              echo  $_SESSION['error']; 
              $_SESSION['error']=null;
              } ?></em> 
      </form>
     


      


  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
          $(".txtb input").on("focus",function(){
            $(this).addClass("focus");
          });
          $(".txtb input").on("blur",function(){
            if($(this).val() == "")
            $(this).removeClass("focus");
          });</script>
    <script type="text/javascript" src="Access/js/log.js"></script>

  </body>
</html>
<?php }?>