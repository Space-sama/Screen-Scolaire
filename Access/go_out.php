<?php 
        
        
                session_start();
                unset($_SESSION);
                session_destroy();
                header("Location: ../Login.php");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Pragma: no-cache"); 
        
        

?>