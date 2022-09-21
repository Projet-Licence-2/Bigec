<?php

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['mdp_oublie'])){
    require 'fonction/fonction.php';
    $email = $_POST['email'];
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
        $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner un email valide !</div>';
    }else{
        require 'include/start_bdd.php';

          $verificationEmail = $bigec->prepare('SELECT * FROM t_client WHERE email=:email');
          $verificationEmail->bindValue(':email',$email);
          $verificationEmail->execute();
          $resultatVerificationEmail= $verificationEmail->fetch();
        if(!$resultatVerificationEmail){
            $message = "<div class='alert alert-danger text-center' role='alert'>L\'adresse email saisie ne correspond a aucun utilisateur dans notre espace membre'</div>";
        }else{
            if($resultatVerificationEmail['validate'] != 1){
              $jeton = jetonAleatoire(40);
              require_once "vendor/autoload.php";

              $mail =new PHPMailer();
              $mail ->isSMTP();
              $mail->Host='in-v3.mailjet.com';
              $mail->SMTPAuth = true;
              $mail->Username='3bfeea3568d4e5b57e85092af7e72800';
              $mail->Password='73bada90bac9bd308d03d7d9a36dda01';
              $mail->SMTPSecure ='tls';
              $mail->Port=587;
              
              $mail->setFrom('camaraabdoulaye.9870@gmail.com', 'BIGEC CONFIRMATION DE L\'INSCRIPTION');
              $mail->addAddress($_POST['email']);
              
              $mail->isHTML(true);
              
              $mail->Subject ='Confirmez votre compte';
                      $mail->Body=
                      '  
                      <div class="mail" style=" margin: auto ; width: 400px; height: 400px;font-size: larger; ">
                          <h3">Confirmation de l\'addresse email</h3><br>
                          <p>
                          Heureux de vous avoir à bord.<br><br>Veuillez confirmer votre adresse e-mail en cliquant sur le button ci-dessous:</p><br>
                          <button style="height: 30px; width: 150px;text-decoration:none; background: orange;color: white;border-radius: 50px;padding: 2px;font-size: 15px;">
                                  <a href="http://localhost/bigec/verification.php?email='.$_POST['email'].'&jeton='.$jeton.'" style=" color: white; font-weight:bold; text-decoration:none; ">Confirmation</a>
                          </button>
                      </div>
                      ';
              
              if(!$mail->send()){
                echo "Mail non envoyé";
                echo 'Erreurs:'.$mail->ErrorInfo;
              }else{
                $message = '<div class="alert alert-success text-center " role="alert">Votre adresse email n\'est pas encore confirmée nous vous enverrons des descriptions pour rénitialiser votre mot de passe</div>';
              }
            }else{
              $jeton = jetonAleatoire(40);
              $verificationEmailPourT_mdp = $bigec->prepare('SELECT * FROM t_mdp_recup WHERE email =:email');
              $verificationEmailPourT_mdp->bindValue(':email',$email);
              $verificationEmailPourT_mdp->execute();

              $nombre = $verificationEmailPourT_mdp->rowCount();
              if($nombre == 0){
                $ajoutInfo = $bigec->prepare('INSERT INTO t_mdp_recup(email,jeton) VALUES (:email,:jeton)');
                $ajoutInfo->bindValue(':email',$email);
                $ajoutInfo->bindValue(':jeton',$jeton);
                $ajoutInfo->execute();
              }else{
                $maj = $bigec->prepare('UPDATE t_mdp_recup SET jeton =:jt WHERE email=:email');
                $maj->bindValue(':jt',$jeton);
                $maj->bindValue(':email',$email);
                $maj->execute();

                require_once "vendor/autoload.php";

                $mail =new PHPMailer();
                $mail ->isSMTP();
                $mail->Host='in-v3.mailjet.com';
                $mail->SMTPAuth = true;
                $mail->Username='3bfeea3568d4e5b57e85092af7e72800';
                $mail->Password='73bada90bac9bd308d03d7d9a36dda01';
                $mail->SMTPSecure ='tls';
                $mail->Port=587;
                
                $mail->setFrom('camaraabdoulaye.9870@gmail.com', 'BIGEC CONFIRMATION REINITIALISATION DU MOT DE PASSE');
                $mail->addAddress($_POST['email']);
                
                $mail->isHTML(true);
                
                $mail->Subject =utf8_decode("Réinitialisation du mot de passe");
                        $mail->Body=
                        '  
                        <div class="mail" style=" margin: auto ; width: 400px; height: 400px;font-size: larger; ">
                            <h3 class="fw-bold">Réinitialisation du mot de passe</h3><br>
                            <p> Afin de réinitialiser votre adresse email, merci de cliquer sur le lien suivant:<br> <br>
                           </p>
                            <button style="height: 30px; width: 400px;text-decoration:none; background: orange;color: white;border-radius: 50px;padding: 2px;font-size: 15px;">
                                    <a href="http://localhost/bigec/nouveauMotDePasse.php?email='.$_POST['email'].'&jeton='.$jeton.'" style=" color: white; font-weight:bold; text-decoration:none; ">Réinitialisation du mot de passe</a>
                            </button>
                        </div>
                        ';
                
                if(!$mail->send()){
                  $message = '<div class="alert alert-danger text-center " role="alert">email non envoyé verifier si vous avez la connexion puis ressayer</div>';
                  echo 'Erreurs:'.$mail->ErrorInfo;
                }else{
                  $message = '<div class="alert alert-success text-center " role="alert">Nous vous avons envoyer par courriel des instructions pour réinitialiser votre mot de passe .</div>';
                }

              }

            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr" class="connec">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | CONNEXION</title>
    <!-- this framework bootstrap-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Nos style css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    
</head>
<body >
    <?php include("header.php");?>
<div class="modal modal-signin position-static d-block  py-5 connexion" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0 cotitle">
        <h4 class="fw-bold mb-0" >MOT DE PASSE OUBLIE</h4>
      </div>
      <?php if(isset($message)){echo $message;} ?>
      
      <div class="modal-body p-5 pt-0">
        <form class="" method="POST" action="">
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-2" id="floatingInput" name="email" placeholder="name@example.com" value=<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']?>>
            <label for="floatingInput">Votre adresse email</label>
          </div>
          <input class="w-100 fw-bold mb-2 btn btn-lg rounded-3 btn-info" type="submit" name="mdp_oublie" value="Réinitialiser mon mot de passe">
            
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php')?>
     <!--All page javascript-->
     <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
</body>
</html>