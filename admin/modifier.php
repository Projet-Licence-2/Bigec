<?php 
    session_start();
    if(!isset($_SESSION['id_admin'])){
    header('Location:../connexion.php');
    }else{
    if(isset($_POST['modifier'])){
    $id = htmlspecialchars($_POST['id_salle']);
    $prix = htmlspecialchars($_POST['prix']);
    $descrip = htmlspecialchars($_POST['descrip']);

    #les verifications des champs 
    if(empty($id) || !preg_match('/[0-9]+/', $id)){
        $message = '<div class="alert alert-danger text-center " role="alert">L\'identifiant saisie est incorrect</div>';
    }elseif(empty($prix) || !preg_match('/[0-9]+/', $prix)){
        $message = '<div class="alert alert-danger text-center " role="alert">Le prix saisie est incorrect</div>';
    }
    elseif(empty($descrip) || !preg_match('/[a-zA-Z]+/', $descrip)){
        $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner la description de la salle !</div>';
    }
    else{
        include_once('../include/start_bdd.php');

        $modificationSalle = $bigec->prepare('UPDATE t_salle SET prix=?,descrip=? WHERE id_salle=?');
        $modificationSalle->bindValue(1,$prix);
        $modificationSalle->bindValue(2,$descrip);
        $modificationSalle->bindValue(3,$id);
        $resultatModification =  $modificationSalle->execute();
        if($resultatModification){
            $message = '<div class="alert alert-success text-center " role="alert">La salle à été modifier avec succès !</div>';  
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
                                            <input type="number" class=" form-control" id="id_salle" name="id_salle" placeholder="Veuillez saisir l'identifiant de la salle à modifier" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Prix</label>
                                            <input type="number" class="form-control" name="prix" id="exampleInputPassword4" placeholder="Prix">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description </label>
                                            <textarea class="form-control" name="descrip" id="exampleTextarea1" rows="4" ></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary me-2" name="modifier" value="Modifier">
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

