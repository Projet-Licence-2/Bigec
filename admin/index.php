<?php 
session_start();
if(!isset($_SESSION['id_admin'])){
  header('Location:../connexion.php');
}else{


  include('../include/start_bdd.php');

  $requeteAffichageTotalSalle = $bigec->query('SELECT COUNT(*) FROM t_salle');
  $resultat = $requeteAffichageTotalSalle->fetchAll();
  $total = $resultat[0][0];

  $requeteAffichageTotalClient = $bigec->query('SELECT COUNT(*) FROM t_client');
  $resultatClient = $requeteAffichageTotalClient->fetchAll();
  $totalClient = $resultatClient[0][0];

  $requeteAffichageTotalReservation = $bigec->query('SELECT COUNT(*) FROM  t_reservation');
  $resultatReservation = $requeteAffichageTotalReservation->fetchAll();
  $totalReservation = $resultatReservation[0][0];

  $requeteAffichageTotalAdmin = $bigec->query('SELECT COUNT(*) FROM t_admin');
  $resultatAdmin = $requeteAffichageTotalAdmin->fetchAll();
  $totalAdmin= $resultatAdmin[0][0];
  
}
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
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0"><span>BI</span>GEC</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">SALLE</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"> <?= intval($total) ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">CLIENT</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= intval($totalClient)?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>                    
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Réservation</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= intval($totalReservation)?></h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Admin</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= intval($totalAdmin)?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
          </div>
         
        
          <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detailed Reports</p>
                  <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                      <div class="ml-xl-4">
                        <h1>33500</h1>
                        <h3 class="font-weight-light mb-xl-4">Sales</h3>
                        <p class="text-muted mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                      </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                      <div class="row">
                        <div class="col-md-6 mt-3 col-xl-5">
                          <canvas id="north-america-chart"></canvas>
                          <div id="north-america-legend"></div>
                        </div>
                        <div class="col-md-6 col-xl-7">
                          <div class="table-responsive mb-3 mb-md-0">
                            <table class="table table-borderless report-table">
                              <tr>
                                <td class="text-muted">Illinois</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">524</h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Washington</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">722</h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Mississippi</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">173</h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">California</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">945</h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Maryland</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">553</h5></td>
                              </tr>
                              <tr>
                                <td class="text-muted">Alaska</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">912</h5></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

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

