<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thanksStyle.css">
    <link rel="icon" type="image/png" href="../Access/img/n.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script>src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>ISGA-CONTACT</title>
</head>
<body style="background-image: url(img/cover-isga-2.png);" class="bg">
<style>

</style>
</body>
</html>
<?php   
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=screen_scolaire;charset=utf8', 'root', ''); 
    } 
    catch(Exception $ex)
    {
        die('Erreur : '.$ex->getMessage());
    }

        if (isset($_POST['Register'])){
            if(isset($_POST['nom']) || isset($_POST['email']) || isset($_POST['TextMessage'])){
           $bdd->query("INSERT INTO contact VALUES(NULL, '$_POST[nom]', '$_POST[email]',CURRENT_TIMESTAMP,  '$_POST[TextMessage]', CURRENT_TIMESTAMP,  '0', '0')"); 
            ?>
            <br /><br /> <br /><br /><br /><br /><br /><br /> 
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">&nbsp; Bonjour <b><?php echo htmlspecialchars($_POST['nom'])?></b></h1>
                   <p class="lead"><strong> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Merci d'avoir nous contactez</strong>
                     On va vous répondre dans les meilleurs délais</p>
                     &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                     <a href="../index.php"><button type="submit"  class="btn btn-outline-primary" id="Register" name="Register"><i class="fa fa-home" aria-hidden="true"></i> Retour à la page d'acceuil</button></a><br /><br />
            </div>
            <?php 
            
            } 
        }          
?>
