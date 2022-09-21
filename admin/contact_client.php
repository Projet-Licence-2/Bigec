<?php 
session_start();
  if(!isset($_SESSION['id_admin'])){
    header('Location:../connexion.php');
  }else{
  include('../include/start_bdd.php');

  $requeteAfficheContact = $bigec->query('SELECT * FROM t_contact');
  $resultatAfficheContact = $requeteAfficheContact->fetch(PDO::FETCH_ASSOC);



  // if(isset($_POST['supprimer'])){
  //   $id = $resultatAfficheContact['id_contact'];

  //   $supprimer = $bigec->prepare('DELETE FROM t_contact WHERE id_contact=:id');
  //   $supprimer->bindValue(':id',$id);
  //   $supprimer->execute();
  // }
  
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
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                        <table class="table table-responsive table-striped">
                            <thead>
                              <tr class=" text-uppercase">
                                <td>#</td>
                                <td>Nom</td>
                                <td>email</td>
                                <td>sujet</td>
                                <td>Message</td>
                                <td colspan="10" class=" text-center">Actions</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php for($i=0;$i<$resultatAfficheContact = $requeteAfficheContact->fetch(PDO::FETCH_ASSOC);$i++):?>
                              <tr>
                                <td><?= $i?></td>
                                <td><?= $resultatAfficheContact['nom']?></td>
                                <td><?= $resultatAfficheContact['email']?></td>
                                <td><?= $resultatAfficheContact['sujet']?></td>
                                <td><?= $resultatAfficheContact['contenu']?></td>
                                <td><a class ="btn btn-warning"href="repondreClient.php?id_msg=<?= $resultatAfficheContact['id_contact']?>">Répondre</a></td>
                                <td><form method="post"><input  class=" btn btn-danger"type="submit" name="supprimer"value="Supprimer"></form></td>
                              </tr>
                              <?php endfor ?>
                            </tbody>
                        </table>
                      </div>
                  </div>
                </div>
            </div>
        </div>
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

