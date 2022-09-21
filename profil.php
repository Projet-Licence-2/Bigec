<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | Profil</title>
    <!-- this framework bootstrap-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Nos style css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
  
</head>
<body>
    <?php include("header.php");
    if(isset($_SESSION['id'])):?>
        <div class="container">
                    <div  class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div class="login-box col-md-12">
                            <h4 style="margin-top: 200px;" class=" rounded-1 fw-bold border p-2 text-center text-white bg-info mb-3 justify-content-center align-items-center">PROFIL</h4>
                                <table class=" table table-striped table-responsive">
                                    <tr><td>Nom : </td><td><?= $_SESSION['nom']?></td></tr>
                                    <tr><td>Prenom : </td><td><?= $_SESSION['prenom']?></td></tr>
                                    <tr><td>Adresse Mail : </td><td><?= $_SESSION['email']?></td></tr>
                                    <tr><td>Numero : </td><td><?= $_SESSION['numero']?></td></tr>
                                    <tr><td>Adresse : </td><td><?= $_SESSION['adresse']?></td></tr>
                                </table>
                                <button class="btn btn-warning rounded "><a class=" btn-link" href="motdepasse.php">Changer le mot de passe</a></button>
                            </div>
                        </div>
                    </div>
        </div>
        <?php endif?>
        
          
  
      <!--All page javascript-->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
</body>
</html>