<?php

use PHPMailer\PHPMailer\PHPMailer;

        session_start();
  if(isset($_POST['connexion'])){
        $email = $_POST['email'];
        $motDePasse =$_POST['motDePasse'];

        include_once("include/start_bdd.php");
        if(!empty($email) && !empty($motDePasse)) 
        {
          $verification = $bigec->prepare("SELECT * FROM t_client WHERE email=:email");
          $verification->bindValue(':email',$email);
          $verification->execute();
          $result = $verification->fetch();
          if(!$result){
            $message = "<div class='alert alert-danger text-center ' role='alert'>Merci de rentrer un adresse mail valide
            
            </div>";
          }
          else{
            
              $motDePasseValide = password_verify($motDePasse, $result['mdp']);
              if($motDePasseValide)
              {
                
                $_SESSION['id'] = $result['id_client'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['adresse'] = $result['adresse'];
                $_SESSION['numero'] = $result['numero'];
  
                  if(isset($_POST['sesouvenir'])){
                    setcookie('email',$_POST['email']);
                    setcookie('mdp',$_POST['motDePasse']);
                  }else{
                    if(isset($_COOKIE['email'])){
                      setcookie($_COOKIE['email'],"");
                    }
                    if(isset($_COOKIE['mdp'])){
                      setcookie($_COOKIE['mdp'],"");
                    }
                  }
  
                header('Location:index.php');
              }
              else
              { 
                $message = "<div class='alert alert-danger text-center ' role='alert'>Mot de passe incorrect</div>";
              }
          }
          
          $verificationAdmin = $bigec->prepare('SELECT * FROM t_admin WHERE email=:email');
          $verificationAdmin->bindValue(':email',$email);
          $verificationAdmin->execute();
          $resultAdmin = $verificationAdmin->fetch();

          if(!$resultAdmin){  
            $message = "<div class='alert alert-danger text-center ' role='alert'>Merci de rentrer un adresse mail valide</div>";
          }else{
            $motDePasseValideAdmin = false;
            if($motDePasse == $resultAdmin['mdp']){
              $motDePasseValideAdmin = true;
            }
            if($motDePasseValideAdmin){
              $_SESSION['id_admin']= $resultAdmin['id_admin'];
              header('Location:admin/index.php');
            } else{
              $message = "<div class='alert alert-danger text-center ' role='alert'>Mot de passe incorrect</div>";
            }
          
          }

        }else{
          $message = '<div class="alert alert-danger text-center " role="alert">Tout les champs doivent être rempli</div>';
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
        <h2 class="fw-bold mb-0" >CONNEXION</h2>
      </div>
      <?php if(isset($message)){echo $message;} ?>
      
      <div class="modal-body p-5 pt-0">
        <form class="" method="POST" action="">
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-2" id="floatingInput" name="email" placeholder="name@example.com" value=<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']?>>
            <label for="floatingInput">Adresse email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-2" id="floatingPassword" name="motDePasse" placeholder="Password" value=<?php if(isset($_COOKIE['mdp'])) echo $_COOKIE['mdp']?>>
            <label for="floatingPassword">Mot de passe</label>
          </div>
          <div class="form-check m-2 ms-0">
              <input class="form-check-input" type="checkbox" name="sesouvenir" id="flexCheckDefault" >
              <label class="form-check-label" for="flexCheckDefault">
                Se souvenir de moi
              </label>
              <small class="text-muted cotext ms-3">
              <a href="motDePasseOublier.php">Mot de passe oublié</a></small>
          </div>
          <input class="w-100 fw-bold mb-2 btn btn-lg rounded-3 btn-info" type="submit" name="connexion" value="CONNEXION">
            
              <hr class="my-4">
              <small class="text-muted cotext">Vous n'avez pas de compte bigec ?
              <a href="inscription.php">S’inscrire</a></small>
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