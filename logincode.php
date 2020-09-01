<?php

       require('dbconfig.php');
       session_start();
if(isset($_POST['login_btn']))
{
        $loginOK=false;
        $user = htmlspecialchars($_POST['Utilisateur']);
        $password = htmlspecialchars($_POST['password']);
        $present_ing = false;
        $present_manag = false;
        $result=$idcom->query("select * from ADMINISTRATEUR where Utilisateur = '".$user."' and Mot_de_passe='".$password."' ");     
        $ligne=$result -> fetch(PDO::FETCH_ASSOC);


        if($user == $ligne['Utilisateur']??'default value' && $password == $ligne['Mot_de_passe']??'default value')
        {
            $loginOK = true;

        }else
        {
            $idcom1 = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
            $result1=$idcom1->query("select * from Etudiant e join GROUPE g on e.ID_GROUPE=g.ID_GROUPE
            join Filiere f on g.ID_FIlIERE=f.ID_FILIERE
            where Utilisateur = '".$user."' and MOT_DE_PASSE='".$password."' AND e.ARCHIVE = 0 AND f.ARCHIVE=0");  
            $ligne1=$result1 -> fetch(PDO::FETCH_ASSOC);
        if($user == $ligne1['UTILISATEUR']?? 'default value' && $password == $ligne1['MOT_DE_PASSE']?? 'default value')
        {

           
            if($ligne1['NOM_FILIERE']=="Ingenierie" && $ligne1['FORMATION']=="Continue"){
                if(key_exists('rm', $_POST)){
                    setcookie('LoginUser', $user, time()+(60*60*7), '/') ; 
                    setcookie('PassUser', $password , time()+(60*60*7), '/'); 
                }
                
                $_SESSION["GROUPE_ING_CONTINUE"] = $ligne1['Classe'];
                $_SESSION["PRESENT_ING"] =  $present_ing;
                $_SESSION["SESSION_ID"] =   $ligne1['ID_ETUDIANT'];
                $_SESSION["SESSION_PRENOM"]=  $ligne1['Prenom'];  
                $_SESSION["SESSION_NOM"] = $ligne1['UTILISATEUR'];
                $_SESSION["SESSION_PWD"] = $ligne1['MOT_DE_PASSE'];
                $_SESSION["SESSION_IMG"] = $ligne1['EMPLOI'];
                $_SESSION["expireTime"] = time();
                 
              echo "<script>window.location.href='ingenieur/index.php'</script>";
          

            }
            else if($ligne1['NOM_FILIERE']=="Management" && $ligne1['FORMATION']=="Continue"){
                if(key_exists('rm', $_POST)){
                    setcookie('LoginUser', $user, time()+(60*60*7), '/') ; 
                    setcookie('PassUser', $password , time()+(60*60*7), '/'); 
                }
                
                $_SESSION["GROUPE_MANAG_CONTINUE"] = $ligne1['Classe'];
                $_SESSION["PRESENT_MANAG"] = $present_manag;
                $_SESSION["SESSION_ID"] = $ligne1['ID_ETUDIANT'];  
                $_SESSION["SESSION_PRENOM"]=  $ligne1['Prenom'];    
                $_SESSION["SESSION_NOM"] = $ligne1['UTILISATEUR'];
                $_SESSION["SESSION_PWD"] = $ligne1['MOT_DE_PASSE'];
                $_SESSION["SESSION_IMG"] = $ligne1['EMPLOI'];
                $_SESSION["expireTime"] = time();
                
             echo "<script>window.location.href='manag/index.php'</script>";
            }

            else if($ligne1['NOM_FILIERE']=="Management" && $ligne1['FORMATION']=="Cca"){
                if(key_exists('rm', $_POST)){
                    setcookie('LoginUser', $user, time()+(60*60*7), '/') ; 
                    setcookie('PassUser', $password , time()+(60*60*7), '/'); 
                }
                
                $_SESSION["GROUPE_MANAG_CCA"] = $ligne1['Classe'];
                $_SESSION["PRESENT_CCA"] = $present_cca;
                $_SESSION["SESSION_ID"] = $ligne1['ID_ETUDIANT'];  
                $_SESSION["SESSION_PRENOM"]=  $ligne1['Prenom'];    
                $_SESSION["SESSION_NOM"] = $ligne1['UTILISATEUR'];
                $_SESSION["SESSION_PWD"] = $ligne1['MOT_DE_PASSE'];
                $_SESSION["SESSION_IMG"] = $ligne1['EMPLOI'];
                $_SESSION["expireTime"] = time();
                
             echo "<script>window.location.href='CCA/index.php'</script>";
            }

            else if($ligne1['NOM_FILIERE']=="Ingenierie" && $ligne1['FORMATION']=="Miage"){
                if(key_exists('rm', $_POST)){
                    setcookie('LoginUser', $user, time()+(60*60*7), '/') ; 
                    setcookie('PassUser', $password , time()+(60*60*7), '/'); 
                }
                
                $_SESSION["GROUPE_ING_MIAGE"] = $ligne1['Classe'];
                $_SESSION["PRESENT_MIAGE"] = $present_miage;
                $_SESSION["SESSION_ID"] = $ligne1['ID_ETUDIANT'];  
                $_SESSION["SESSION_PRENOM"]=  $ligne1['Prenom'];    
                $_SESSION["SESSION_NOM"] = $ligne1['UTILISATEUR'];
                $_SESSION["SESSION_PWD"] = $ligne1['MOT_DE_PASSE'];
                $_SESSION["SESSION_IMG"] = $ligne1['EMPLOI'];
                $_SESSION["expireTime"] = time();
                
             echo "<script>window.location.href='MIAGE/index.php'</script>";
            }

        }
        else{
             $_SESSION['error']=$user." "."N'existe Pas";
             echo "<script>window.location.href='Login.php'</script>";
        }
    }
            
            if($loginOK==true)
            {
                if(key_exists('rm', $_POST)){
                    setcookie('LoginUser', $user, time()+(60*60*7), '/') ; 
                    setcookie('PassUser', $password , time()+(60*60*7), '/'); 
                }
                $_SESSION['login']=$loginOK;
                $_SESSION['nom']=$ligne['Nom'];
                $_SESSION['prenom']=$ligne['Prenom'];
                $_SESSION['utilisateur']=$user;
                $_SESSION['password']=$ligne['Mot_de_passe'];
                $_SESSION['role']=$ligne['Role'];
                $_SESSION['photo']=$ligne['Photo'];
            
                echo "<script>window.location.href='Admin/Home/Home.php'</script>";
            }

}

?>