<?php session_start();

    include_once('include/start_bdd.php');

    $afficheReservationClient = $bigec->prepare('SELECT * FROM t_reservation WHERE id_client=:id_client ORDER BY date_r DESC');
    $afficheReservationClient->bindValue(':id_client',$_SESSION['id']);
    $afficheReservationClient->execute();

    $afficheSalle = $bigec->prepare('SELECT * FROM t_salle');
    $afficheSalle->execute();
    

    
    
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
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <table class=" table table-bordered table-responsive table-striped">
                            <thead class=" bg-secondary text-uppercase">
                                <tr class="text-center">
                                    <td>Image de la salle</td>
                                    <td>Ville</td>
                                    <td>Quartier</td>
                                    <td>Prix</td>
                                    <td>Date</td>
                                    <td>Heure</td>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($resultatAfficheReservationClient = $afficheReservationClient->fetch() AND $resultat = $afficheSalle->fetch()):?>
                                <tr class="text-center">
                                    <td><a href="assets/images/Salles/<?= $resultat['photo']?>">Voir l'image </a></td>
                                    <td><?= $resultat['ville']?></td>
                                    <td><?= $resultat['quartier']?></td>
                                    <td><?= $resultat['prix']?> GNF</td>
                                    <td><?= $resultatAfficheReservationClient['date_r']?></td>
                                    <td><?= $resultatAfficheReservationClient['heure']?></td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
         
  
      <!--All page javascript-->
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
      
</body>
</html>