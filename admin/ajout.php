<?php
    session_start();
    if(!isset($_SESSION['id_admin'])){
    header('Location:../connexion.php');
    }else{

	    if(isset($_POST['ajouter'])){

        $ville = htmlspecialchars($_POST['ville']);
        $quartier = htmlspecialchars($_POST['quartier']);
        $prix = htmlspecialchars($_POST['prix']);
        $descrip = htmlspecialchars($_POST['descrip']);

        #les verifications des champs 
        if(empty($ville) || !preg_match('/[a-zA-Z]+/', $ville)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner la ville de la salle !</div>';
        }elseif(empty($quartier) || !preg_match('/[a-zA-Z]+/', $quartier)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le quartier de la salle !</div>';
        }elseif(empty($prix) || !preg_match('/[0-9]+/', $prix)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner Le prix de la salle</div>';
        }
        elseif(empty($descrip) || !preg_match('/[a-zA-Z]+/', $descrip)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner la description de la salle !</div>';
        }else{

            include_once('../include/start_bdd.php');
        
            extract($_POST);
            
            $photo = $_FILES['photo']['name'];
            $nomtemporairePhoto = $_FILES['photo']['tmp_name'];
            move_uploaded_file($nomtemporairePhoto,"../assets/images/salles/$photo");
    
            $AjoutDesSalles = $bigec->prepare('INSERT INTO t_salle(ville,quartier,prix,descrip,photo) VALUES (:ville,:quartier,:prix,:descrip,:photo)');
            $AjoutDesSalles->bindValue(':ville',$ville);
            $AjoutDesSalles->bindValue(':quartier',$quartier);
            $AjoutDesSalles->bindValue(':prix',$prix);
            $AjoutDesSalles->bindValue(':descrip',$descrip);
            $AjoutDesSalles->bindValue(':photo',$photo);			
            
            $resulat=$AjoutDesSalles->execute();
            
            if($resulat){
                
                $message = "<div class='alert alert-success text-center ' role='alert'>Le produit à été enregistrer avec succès</div>";
                // header('location:index.php');
            }
        }

        
        
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BIGEC | Admin</title>
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
 
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container-scroller">
        <?php include_once('header.php')?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Ajout des informations sur le produit</h4>
                    <?php if(isset($message)) echo $message ?>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName1">Ville</label>
                            <input type="text" class="form-control" name="ville" id="exampleInputName1" placeholder="Ville" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Quartier</label>
                            <input type="text" class="form-control" name="quartier" id="exampleInputName2" placeholder="Quartier">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Prix</label>
                            <input type="number" class="form-control" name="prix" id="exampleInputPassword4" placeholder="Prix">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Description </label>
                            <textarea class="form-control" name="descrip" id="exampleTextarea1" rows="4" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Image</label>
                            <input type="file" class="form-control" name="photo" id="exampleInputPassword4" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary me-2"  name="ajouter" value="Ajouter">
                            <input class="btn btn-warning" type="reset" value="Annuler">
                        </div>
                    </form>
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

