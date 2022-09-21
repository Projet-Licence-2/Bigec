<?php session_start();

include_once('include/start_bdd.php');

$afficheSalleIndex = $bigec->query('SELECT * FROM t_salle LIMIT 6');



?>
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
        <!--Debut du CAROUSEL-->
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="assets/images/slide_02.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="assets/images/slide_03.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/images/slide_01.jpg" class="d-block w-100" alt="...">
                  </div>
              </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Suivant</span>
                </button>
          </div>
          <div class="container-fluid bg-secondary " style="height:150px; ">
            <h1 class=" text-bg-secondary text-center p-5 ">BI<span style="color: #0dcaf0; ">GEC</span> vous recommande ces lieux pour vos réunions </h1>
          </div>
          <main>
              <div class="album py-5 bg-light">
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">       
                    <?php 
                      while($resultatAfficheIndex= $afficheSalleIndex->fetch()):
                    ?>              
                    <div class="col">
                      <div class="card shadow-sm">
                          <img  class ="bd-placeholder-img card-img-top" src="assets/images/salles/<?=$resultatAfficheIndex['photo'] ?>" alt="" >
                        <div class=" container card-body">
                        <div class="row">
                          <div class="col-md-12">
                              <h5><span><?=$resultatAfficheIndex['ville'] ?></span> - <span><?=$resultatAfficheIndex['quartier'] ?></span></h5>
                              <h5 class=" "><span><?=$resultatAfficheIndex['prix'] ?></span> GNF/jour</h5>
                          </div>
                          <div class="col-md-12">
                              <button class=" btn btn-warning d-block " id="detail" ><a class="link" href="detailprod.php?id_salle=<?=$resultatAfficheIndex['id_salle']?>">voir détail</a></button>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    <?php endwhile ?>
                  </div>
                </div>
              </div>
          </main>
          <style>
            #catalogue:hover{
              color:gold;
            }
          </style>
          <div class="container-fluid  " style="height:100px; ">
            <h1 class="text-center p-4 "><a id="catalogue"style="color:#0dcaf0;" href="catalogue.php">Voir le catalogue</a></h1>
          </div>
          <div class="container mb-5 p-2">
            <div class="border container-border p-3 rounded-4">
                <div class="row">
                    <div class="col">
                        <h2 class="h4">
                            Ils nous font confiance
                        </h2> 
                        <p class="mb-3 font-weight-light h5">
                          Ils organisent leurs réunions grâce à Bigec.
                        </p>
                    </div>
                </div>
                <div class="row">
                  <div class="col">
                  <marquee width="100%" scrollamount="10" scrolldelay="10">
                    <!-- L'objet parcourt 2px chaque 10ms -->
                    <img src="assets/images/logo/ivision.png">
                    <img src="assets/images/logo/soudou.png">
                    <img src="assets/images/logo/hocs.png">
                    <img src="assets/images/logo/total.png">
                    <img src="assets/images/logo/microsoft.png">
                    <img src="assets/images/logo/guico.png">
                    <img src="assets/images/logo/mtn.png"> 
                    <img src="assets/images/logo/aguimmo.jfif">
                    <img src="assets/images/logo/cnrd.jfif">                   
                    <img src="assets/images/logo/orange.png">
                    
                  </marquee>
                  </div>
                </div>
            </div>
          </div>
          
         
         <?php include("footer.php");?>
         
      <!--All page javascript-->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
      
</body>
</html>