<?php
   session_start(); 
  include_once ('include/start_bdd.php');

  //Systeme de pagination
  $salleParPage = 9;
  $totalSallePage = $bigec->query("SELECT * FROM t_salle");
  $Total = $totalSallePage->rowCount();
  $totalPage = ceil($Total/$salleParPage);
  if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 ){
      $_GET['page']=intval($_GET['page']);
      $pageCourante = $_GET['page'];
  }else{
      $pageCourante = 1;
  }
  $debut = ($pageCourante - 1)*$salleParPage;

  $salle=[];
if(isset($_GET['search'])){
  $recherche = $bigec->prepare('SELECT * FROM t_salle WHERE ville LIKE :recherche');
  $recherche->bindValue(':recherche', '%'.$_GET['recherche']. '%');
  $recherche->execute();
  if(!$recherche){
    $message = 'Oups je n\'arrive pas a trouvé sa';
  }
  $salle = $recherche->fetchAll(PDO::FETCH_ASSOC); 
}else{
  $AffichageSalleCatalogue = $bigec->query("SELECT * FROM t_salle ORDER BY id_salle ASC LIMIT $debut,$salleParPage");
  $salle = $AffichageSalleCatalogue->fetchAll(PDO::FETCH_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | CATALOGUE</title>
     <!-- this framework bootstrap-->
     <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Nos style css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
</head>
<body>
        <?php include ("header.php"); ?>
        <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


  </head>
  <body>
  <div class="page-catalogue container-fluid" >
        <div class="row  ">
          <div class="col-md-12">
            <div class="text-content">
            <form class="d-flex w-100" style=" margin:0 auto;" method="GET" action="">
              <input style="margin: 150px;" class="form-control me-2" name="recherche" type="search" placeholder="Tapez la ville à rechercher" aria-label="Search">
              <input style="margin: 150px 0;" class="btn btn-outline-warning text " name="search" type="submit" value="Rechercher">
            </form>
            </div>
          </div>
        </div>      
  </div>
<div class="container-fluid page_recherche">
  <div class="row">
      
  </div>
</div>


<main>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">       
        <?php 
          if(isset($message))
          {
            echo $message;
          }
          foreach($salle as $resultat):
        ?>              
        <div class="col">
          <div class="card shadow-sm">
              <img  class ="bd-placeholder-img card-img-top" src="assets/images/salles/<?= $resultat['photo'] ?>" alt="" >
            <div class=" container card-body">
             <div class="row">
               <div class="col-md-12">
                  <h5><span><?= $resultat['ville'] ?></span> - <span><?= $resultat['quartier'] ?></span></h5>
                  <h5 class=" "><span><?= $resultat['prix'] ?></span> GNF/jour</h5>
               </div>
               <div class="col-md-12">
                  <button class=" btn btn-warning d-block " id="detail" ><a class="link" href="detailprod.php?id_salle=<?= $resultat['id_salle']?>">voir détail</a></button>
               </div>
             </div>
            </div>
          </div>
        </div>
        <?php endforeach?>
      </div>
    </div>
  </div>

</main>

<!--PAGINATION DE LA PAGE-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="..." style="margin-bottom:20px;">
        <ul class="pagination">
          <?php for($i=1;$i<= $totalPage;$i++) :?>
          <li class="page-item"><a class="page-link" href="catalogue.php?page=<?= $i ?>"><?= $i ?></a></li>
         <?php endfor ?>
        </ul>
      </nav>
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