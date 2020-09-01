<?php

try
{
    $host="localhost";
    $base="SCREEN_SCOLAIRE";
    $user="root";
    $pwd="";
    $dsn="mysql:host=".$host.";dbname=".$base;

        $bdd=new PDO($dsn, $user, $pwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);


        }catch(Exception $ex)
        
        {
            die('Erreur data base' .$ex->getMessage());
        }

?>