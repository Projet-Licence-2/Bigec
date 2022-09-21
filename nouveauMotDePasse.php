<?php
    if(isset($_POST))
    {
        
        if(isset($_GET['email']))
        {
            $email = $_GET['email'];
        }
    
        if(isset($_GET['jeton']))
        {
                $jeton = $_GET['jeton'];
        }

        if(!empty($email) && !empty($jeton))
        {
            require_once 'include/start_bdd.php';
            $requeteVerification = $bigec->prepare('SELECT * FROM t_mdp_recup WHERE email=:email AND jeton=:jeton');
            $requeteVerification->bindValue(':email',$email);
            $requeteVerification->bindValue(':jeton',$jeton);
            $requeteVerification->execute();
            $nbrRow = $requeteVerification->rowCount();
            if($nbrRow != 1)
            {
                header('location:connexion.php');
            }else{
                if(isset($_POST['modifier'])){
                    if(empty($_POST['motDePasse1']) && ($_POST['motDePasse1'] != $_POST['motDepass2'])){
                        $message = '<div class="alert alert-danger text-center " role="alert">le mot de passe n\'est pas valide</div>';
                    }else{
                        $mdp = password_hash($_POST['motDePasse1'],PASSWORD_DEFAULT);
                        $majPassword = $bigec->prepare('UPDATE t_client SET mdp=:mdp WHERE email=:email');
                        $majPassword->bindValue(':mdp',$mdp);
                        $majPassword->bindValue(':email',$email);
                       $resultatMajPassword = $majPassword->execute();

                        if($resultatMajPassword)
                        {?>
                            <script>
                                alert('Votre mot de passe est bien reinitialisé');
                                        document.location.href='connexion.php';
                            </script>
                        <?php  }else
                        {
                            $message = '<div class="alert alert-danger text-center " role="alert">Votre mot de passe n\'a pas reinitialisé</div>';
                        }
                    }

                }
            }
        }

    }else
    {
        header('location:inscription.php');
    }
?>
<!DOCTYPE html>
<html lang="fr" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | Mot de passe</title>
    <!-- this framework bootstrap-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Nos style css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
  
</head>
<body>
    <?php include("header.php");?>
    <div class="modal modal-signin position-static d-block  py-5 motpasse" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0 cotitle">
                    <h2 class="fw-bold mb-0" >Modification </h2>
                </div>
                <?php if(isset($message)){echo $message;} ?>
                
                <div class="modal-body p-5 pt-0">
                    <form class="" method="POST" action="">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-2" id="floatingPassword" name="motDePasse1" placeholder="Password">
                        <label for="floatingPassword">Nouveau mot de passe</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-2" id="floatingPassword" name="motDePasse2" placeholder="Password">
                        <label for="floatingPassword">Confirmer le Mot de passe</label>
                    </div>
                    <input class="w-100 fw-bold mb-2 btn btn-lg rounded-3 btn-info" type="submit" name="modifier" value="MODIFIER">
                    </form>
                </div>
            </div>
        </div>
    </div>
        
          
  
      <!--All page javascript-->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
</body>
</html>