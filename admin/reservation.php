
<?php 
  session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location:../connexion.php');
  }else{
  include_once('../include/start_bdd.php');

  $listeReservation = $bigec->query("SELECT * FROM t_reservation;");

  $listeClient = $bigec->query("SELECT * FROM t_client;");

  $listeSalle = $bigec->query("SELECT * FROM t_salle;");

}
;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BIGEC | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>
<body>
    <div class="container-scroller">
        <?php include_once('header.php')?>
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des réservations</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class=" text-uppercase">
                          <th>
                            #
                          </th>
                          <th>
                            Client
                          </th>
                          <th class=" text-center">
                            Prix
                          </th>
                          <th class=" text-center">
                            Heure
                          </th>
                          <th class=" text-center">
                            Date
                          </th>                         
                          <th class=" text-center">
                            id_salle
                          </th>
                        </tr>
                      </thead>
                        <tbody>
                          <?php $i=0; while( $i<$resultatListeReservation = $listeReservation->fetch() AND   $resultatlisteClient = $listeClient->fetch() AND   $resultatlisteSalle = $listeSalle->fetch()):?>
                          <tr >
                            <td>
                            <?= $i++ ?>
                            </td>
                            <td>
                            <?= $resultatlisteClient['nom']?> <?= $resultatlisteClient['prenom']?>
                            </td>
                            <td class=" text-center">
                            <?= $resultatlisteSalle['prix']?> <span>GNF</span>
                            </td>
                            <td class=" text-center">
                            <?= $resultatListeReservation['heure']?>
                            </td class=" text-center">
                            <td class=" text-center">
                            <?= $resultatListeReservation['date_r']?>
                            </td>
                            <td class=" text-center">
                            <?= $resultatListeReservation['id_salle']?>
                            </td>
                          </tr>
                          <?php endwhile ?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
            </div>        
        </div>
    </div>
  </div>
 

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

