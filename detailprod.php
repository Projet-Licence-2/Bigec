<?php session_start();

include_once("include/start_bdd.php");
    $id = $_GET['id_salle'];
    $AffichageSalleParId = $bigec->prepare('SELECT * FROM t_salle WHERE id_salle=:id_salle');
    $AffichageSalleParId->bindValue(":id_salle",$id);
    $AffichageSalleParId->execute();
    $resultatAffichaParId = $AffichageSalleParId->fetch(PDO::FETCH_ASSOC);

    
   

    if(isset($_POST['reserver'])){
        if(!isset($_SESSION['id'])){ 
            header('Location:connexion.php');
        }else{
            extract($_POST);
            $dateActuelle = date('Y-m-j');
            if($date_r < $dateActuelle){
                $message = "<div class='alert alert-danger text-center ' role='alert'>La date saisie est incorrecte</div>";
            }else{
                $verificationDateReservation = $bigec->prepare("SELECT * FROM t_reservation WHERE ( id_salle=:id_salle AND date_r=:date_r )");
                $verificationDateReservation->bindValue(':date_r',$date_r);
                $verificationDateReservation->bindValue(':id_salle',$id);
                $verificationDateReservation->execute();
                $resultatVerificationDateReservation = $verificationDateReservation->fetch();

                if($resultatVerificationDateReservation){
                    $message = "<div class='alert alert-danger text-center ' role='alert'>La salle à été reserver à cette date</div>";
                }else{
                    $id_salle = $resultatAffichaParId['id_salle'];
                    extract($_POST);
                    $ajoutReservationSalle = $bigec->prepare('INSERT INTO t_reservation(heure,date_r,id_client,id_salle) VALUES (:heure,:date_r,:id_client,:id_salle)');
                    $ajoutReservationSalle->bindValue(':heure',$heure);
                    $ajoutReservationSalle->bindValue(':date_r',$date_r);
                    $ajoutReservationSalle->bindValue(':id_client',$_SESSION['id']);
                    $ajoutReservationSalle->bindValue(':id_salle',$id_salle);
                    $resultatAjout = $ajoutReservationSalle->execute();
                    if($resultatAjout){
                        $message = "<div class='alert alert-success text-center ' role='alert'>La salle est reservé avec succès</div>";
                }
                }
                
            }
            


        }
    }
    if(isset($_POST['envoyer'])){
        include_once('include/start_bdd.php');
        $avis = htmlspecialchars($_POST['avis']);

        if(empty($avis)){
            $message = "<div class='alert alert-danger text-center h5 ' role='alert'>Le champ ne doit pas être vide</div>"; 
        }else{
           if(!isset($_SESSION['id'])){
                header('Location:connexion.php');
           }else{
            $verificationSalleReserver = $bigec->prepare('SELECT * FROM t_reservation WHERE id_client = :id_client AND id_salle=:id_salle');
            $verificationSalleReserver->bindValue(':id_client',$_SESSION['id']);
            $verificationSalleReserver->bindValue(':id_salle',$id);
            $verificationSalleReserver->execute();
            $resultatVerificationSalleReserver = $verificationSalleReserver->fetch();
            if($resultatVerificationSalleReserver == 0){
                $message = "<div class='alert alert-danger text-center h5 ' role='alert'>Vous devez réserver la salle avant de donner votre avis</div>"; 
            }else{
                $date = date('Y-m-j');
                $ajoutAvisSalle = $bigec->prepare('INSERT INTO t_avis(contenu,date_a,id_client,id_salle) VALUES (:contenu,:date_a,:id_client,:id_salle)');
                $ajoutAvisSalle->bindValue(':contenu',$avis);
                $ajoutAvisSalle->bindValue('date_a',$date);
                $ajoutAvisSalle->bindValue(':id_client',$_SESSION['id']);
                $ajoutAvisSalle->bindValue(':id_salle',$id);
                $resultatAjoutAvisSalle = $ajoutAvisSalle->execute();
                if($resultatAjoutAvisSalle){
                    $message = "<div class='alert alert-success text-center h5' role='alert'>Merci d'avoir donnez votre avis sur la salle</div>"; 
                }
            }
           }
        }
    }

    
    $requeteAvis = $bigec->prepare("SELECT * FROM t_avis WHERE id_salle=:id_salle");
    $requeteAvis->bindValue(':id_salle',$id);
    $requeteAvis->execute();



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
    <div class="container"><?php if(isset($message)) echo $message ?></div>
    <div class="container mt-5" >
        <div class="row">
            <div class="col-md-8">
                
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/salles/<?= $resultatAffichaParId['photo']?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/salles/<?= $resultatAffichaParId['photo']?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/salles/<?= $resultatAffichaParId['photo']?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précedent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col">
                    <img src="assets/images/salles/<?= $resultatAffichaParId['photo']?>" class="d-block w-100" alt="...">
                    <img src="assets/images/salles/<?= $resultatAffichaParId['photo']?>" class="d-block w-100 mt-3" alt="...">
                </div>
            </div>
            
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <h2 class=" h3 fw-bold ">Location espace moderne à <span><?= $resultatAffichaParId['quartier']?></span> dans la ville de <span><?= $resultatAffichaParId['ville']?></span></h2>
                <hr class="my-5">
                <h6 class=" h6 fw-bold mb-2 text-github" style="font-size: 30px; ">Description</h6>
                <p class=" h5" style="font-size:20px; margin-bottom:30px;margin-top:30px; text-align:justify; letter-spacing:1px">
                <?= $resultatAffichaParId['descrip']?> 
                </p>
                <hr class="my-3">
            </div>
            <div class="col-md-4 border-1 shadow">
                <h3 class="h2 fw-bolder text-center"> Réservation</h3>
               
                <div class="mb-4 mt-4 ms-4">
                            <h6 class="h6  text-center" style="font-size: 45px; font-family: sans-sherif; "><?= $resultatAffichaParId['prix']?><span style="color: gold;"> gnf</span></h6>
                </div>
              
                <form class="modal-content" method="POST">
                    <div class="row from-group">
                        <div class="mb-2">
                            <label for="date" class=" form-control border-0">Date</label>
                            <input type="date" class=" form-control" name="date_r" id="date" >
                        </div>
                    </div>
                    <div class="row from-group">
                        <div class="mb-2">
                            <label for="date" class=" form-control border-0">Heure début</label>
                            <input type="time" class=" form-control" name="heure" id="date">
                        </div>
                    </div>
                    <div class="row from-group">                        
                        <div class=" mb-3 ">                    
                            <input  class="w-100 fw-bold mb-2 btn btn-lg me-2 btn-info" name="reserver" type="submit" value="Réserver">
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-8">
                <h2 class=" text-center ">Avis des clients</h2>
                    <?php while($resultatRequeteAvis = $requeteAvis->fetch()){
                        $affichageAvisClient = $bigec->query("SELECT * FROM t_client WHERE id_client=".$resultatRequeteAvis['id_client']);
                        $result = $affichageAvisClient->fetch();
                    ?>
                    <h6 class=" text-black"><?= $result['prenom'] ?> <span><?= $result['nom']?></span></h6>
                    
                    <p class=" m-2 text-black h4 "><?= $resultatRequeteAvis['contenu']?></p>
                    <div class=""></div><?php } ?>
                </div>
                
                <div class="col-md-4">
                    <form action="" method="POST">
                        <div class="from-group">
                            <label class=" form-label h5" for="avis">Donnez votre avis sur la salle</label>
                            <textarea  class="form-control mb-0"name="avis" id="avis" cols="15" rows="2" placeholder="Votre avis">

                            </textarea>
                        </div>
                        <input class="btn btn-warning "type="submit" value="Envoyer" name="envoyer">
                    </form>
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