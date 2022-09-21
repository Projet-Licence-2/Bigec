<?php
session_start();
if(isset($_SESSION['id_admin'])){
    
        session_unset();
        session_destroy();
        header('Location:../connexion.php');
    }else{
        echo 'je n\'existe pas monsieur';
    }

?>   
 