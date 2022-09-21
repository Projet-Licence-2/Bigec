<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | Accueil</title>
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
    <div class="container bootstrap-select">
        <div class="col" style="width: 1000px; margin-left:300px; margin-top:200px">
            <h3 class=" fw-bold m-4">Mentions légales</h3>
            <p class=" text-center w-75 text-content fs-4" style="text-align:justify">
                Société :
                Le site www.bigec.com est édité par le groupe A2  dans le but de répondre à un projet PHP et non dans but commercial 
               <br> Contact : +224 666 66 66 66
            </p>
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