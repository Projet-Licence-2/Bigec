<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    require_once 'include/start_bdd.php';

    if($_GET){
        if(isset($_GET['email'])){
            $email = $_GET['email'];
        }

        if(isset($_GET['jeton'])){
            $jeton = $_GET['jeton'];
        }
    }

    if(!empty($email) AND !empty($jeton)){
        $verificaton  = $bigec->prepare('SELECT * FROM t_client WHERE email=:email AND jeton =:jeton');
        $verificaton->bindValue(':email',$email);
        $verificaton->bindValue(':jeton',$jeton);
        $verificaton->execute();

        $resultatVerification = $verificaton->rowCount();

        if($resultatVerification == 1){
            $maj = $bigec->prepare('UPDATE t_client SET jeton=:jeton, validate =:validate WHERE email=:email');
            $maj->bindValue(':jeton','valide');
            $maj->bindValue(':validate',1);
            $maj->bindValue(':email',$email);
            $maj->execute();

            if($maj){
                 
                ?>
                   <script>
                            alert('Votre adresse email est bien confirmée');
                            document.location.href='connexion.php';
                   </script>
         <?php   }
        }
    }
?>
