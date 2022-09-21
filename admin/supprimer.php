<?php 
    session_start();
    if(!isset($_SESSION['id_admin'])){
    header('Location:../connexion.php');
    }else{
    if(isset($_POST['supprimer'])){
    $id = htmlspecialchars($_POST['id_salle']);
    
    if(empty($id) || !preg_match('/[0-9]+/', $id)){
        $message = '<div class="alert alert-danger text-center " role="alert">L\'identifiant saisie est incorrect</div>';
    }
    else{
        include_once('../include/start_bdd.php');
        $suppresionSalle = $bigec->prepare('DELETE FROM t_salle WHERE id_salle=:id');
        $suppresionSalle->bindValue(':id',$id);
        $resultatSuppresion = $suppresionSalle->execute();
        if($resultatSuppresion){
            $message = '<div class="alert alert-success text-center " role="alert">La salle à été supprimer avec succès !</div>';  
        }else{
            $message = '<div class="alert alert-danger text-center " role="alert">L\'identifiant saisie est incorrect</div>';
        }
        
    }
}
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
            <div class="content-wrapper">
                <div class="">
                    <div class="content-wrapper">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Mofification des informations sur le produit</h4>
                                    <?php if(isset($message)) echo $message?>
                                     <form class="forms-sample" method="post">
                                        <div class="from-group">
                                            <label for="id_salle">Identifiant de la salle</label>
                                            <input type="number" class=" form-control my-4" id="id_salle" name="id_salle" placeholder="Veuillez saisir l'identifiant de la salle à modifier" >
                                        </div>
                                        <input type="submit" class="btn btn-primary me-2" name="supprimer" value="Supprimer">
                                        <input class="btn btn-warning" type="reset" value="Annuler">
                                    </form>
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

