<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | About </title>
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
    <div class="page-heading about-heading header-text" id="desc">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4 class=" text-info fw-bold">A propos de nous</h4>
              <h2>Notre entreprise</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row p-0">
          <div class="col-md-6">
            <div class="right-image">
              <img class=" img-fluid logo" src="assets/images/feature-image1.jpg" alt="LOGO">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4 style="font-size:30px;">Qui nous sommes &amp; Ce que nous faisons</h4>
                  <p style="font-size:20px; text-align:justify;" >
                    BIGEC est une entreprise spécialisée dans la location de salle pour l’organisation de 
                    réunion par les entreprises ou les particuliers et la vente des produits en lignes,
                    situé à 300 Boulevard de Kaloum Conakry, Guinée.
                  </p>
                  <p style="font-size:20px; text-align:justify;">
                    Nous disposons de salles dans toute la Guinée et plus précisément à Conakry, Kankan et Mamou
                  </p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  <!--LA MISSION, LA VISION ET LA VALEUR DE L'ENTREPRISE-->
<div class="apropos" id="mission">
  <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="assets/images/Mission.jpg" class="card-img-top" alt="Mission">
                    <div class="card-body">
                        <h5 class="card-title">MISSION</h5>
                        <p class="card-text">Apporter la solution à nos clients et partenaires pour assurer leur plus grande satisfaction.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="assets/images/vision.jpg" class="card-img-top" alt="Vision">
                    <div class="card-body">
                        <h5 class="card-title">VISION</h5>
                        <p class="card-text">Innover dans la simplicité et le respect de nos engagements basé sur la disponibilité des salles.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="assets/images/Valeur.jpg" class="card-img-top" alt="Valeur">
                    <div class="card-body">
                        <h5 class="card-title">VALEUR</h5>
                        <p class="card-text">Ecouter, Préconiser, Conseiller, Former... parce que nous nous préoccupons de la satisfaction des clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--Les membres de l'entreprise-->
    
  <section id="team" class="pb-5 mt-5">
    <div class="container">
        <h5 class="section-title h1">NOTRE EQUIPE</h5>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="assets/images/team_01.jpg" alt="card image"></p>
                                    <h4 class="card-title">Abdoulaye CAMARA</h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">PDG</h4>
                                    <p class="card-text">Mr Camara Abdoulaye le PDG de l'entreprise bigec </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="assets/images/team_01.jpg" alt="card image"></p>
                                    <h4 class="card-title">Ibrahima DIALLO </h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Directeur</h4>
                                    <p class="card-text">Mr Diallo Ibrahima est le directeur de notre entreprise qui fait de son mieu pour que l'entreprise soit au top</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="assets/images/team_01.JPG" alt="card image"></p>
                                    <h4 class="card-title">Ayouba DIAKITE<h4>
                                    <p class="card-text"></p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Responsable Informatique</h4>
                                    <p class="card-text">Mr Diakité est informaticien de l'entreprise qui fais des efforts pour nous tirer vers le haut</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="assets/images/team_02.jpg" alt="card image"></p>
                                    <h4 class="card-title">Ibrahima BAH</h4>
                                    <p class="card-text"></p>                                    
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Responsable Marketing</h4>
                                    <p class="card-text">Mr Bah est responsable Marketing et l'administrateur de vente de l'entreprise</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="assets/images/team_02.jpg" alt="card image"></p>
                                    <h4 class="card-title">Aboubacar CAMARA</h4>
                                    <p class="card-text"></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text">Mr Camara est l'actionnaire de la compatabilité de l'entreprise</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="assets/images/team_02.jpg" alt="card image"></p>
                                    <h4 class="card-title">Delphine Dédé </h4>
                                    <p class="card-text"></p>                           
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"></h4>
                                    <p class="card-text">Nous disposons de salles dans toute la Guinée et plus précisément à Conakry, Kankan et Mamou</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="https://www.fiverr.com/share/qb8D02">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          

        </div>
    </div>
  </section>

  <?php include("footer.php");?>

      <!--All page javascript-->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
      <!-- Additional Scripts -->
      <script src="assets/js/custom.js"></script>
      <script src="assets/js/owl.js"></script>
      <script src="assets/js/slick.js"></script>
      <script src="assets/js/isotope.js"></script>
      <script src="assets/js/accordions.js"></script>
     
</body>
</html>