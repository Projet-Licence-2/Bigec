<?php session_start();
    if(isset($_POST['modifier']))
    {
        if(empty($_POST['motDePasse1']) && ($_POST['motDePasse1'] != $_POST['MotDePasse2'])){
            $message = '<div class="alert alert-danger text-center " role="alert">le mot de passe saisie ne correspond pas </div>';
        }else{
            include_once('include/start_bdd.php');
            $motDePasse = password_hash($_POST['motDePasse1'], PASSWORD_DEFAULT);
            $moficationMotDePasee = $bigec->prepare('UPDATE t_client SET mdp=:mdp WHERE id_client = :id');
            $moficationMotDePasee->bindValue(':mdp',$motDePasse);
            $moficationMotDePasee->bindValue(':id',$_SESSION['id']);
            $resulataModification = $moficationMotDePasee->execute();
            if($resulataModification){
                $message = '<div class="alert alert-success  text-center " role="alert">Votre mot de passe à été mise à jour </div>';
            }

        }
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