<?php

use PHPMailer\PHPMailer\PHPMailer;

session_start();
if(!isset($_SESSION['id_admin'])){
  header('Location:../connexion.php');
}else{


  include('../include/start_bdd.php');
  $id_contact = $_GET['id_msg'];

  $afficheMsg = $bigec->prepare('SELECT * FROM t_contact WHERE id_contact=:id');
  $afficheMsg->bindValue(':id',$id_contact);
  $afficheMsg->execute();
  $resultatAfficheMsg = $afficheMsg->fetch();



  if(isset($_POST['envoyer_rep'])){
    $titre = strip_tags($_POST['titre_rep']);
    $contenu = strip_tags($_POST['contenu_rep']);

    $ajoutReponse = $bigec->prepare('INSERT INTO t_response(titre_rep,contenu_rep) VALUES (:titre,:contenu)');
    $ajoutReponse->bindValue(':titre',$titre);
    $ajoutReponse->bindValue(':contenu',$contenu);
    $resulatAjoutReponse = $ajoutReponse->execute();
    
    #envoi email
    if($resulatAjoutReponse){
        $client = $bigec->query('SELECT * FROM t_client');

        require_once "../vendor/autoload.php";
                
        $mail =new PHPMailer();
  
        $mail ->isSMTP();
        $mail->Host='in-v3.mailjet.com';
        $mail->SMTPAuth = true;
        $mail->Username='3bfeea3568d4e5b57e85092af7e72800';
        $mail->Password='73bada90bac9bd308d03d7d9a36dda01';
        $mail->SMTPSecure ='tls';
        $mail->Port=587;
        
        $mail->setFrom('camaraabdoulaye.9870@gmail.com', 'REPONSE');
        $mail->addAddress($resultatAfficheMsg['email']);
        
        $mail->isHTML(true);
        
        $mail->Subject =utf8_decode($titre);
                $mail->Body=utf8_decode(
                '  
                <div class="mail" style=" margin: auto ; width: 400px; height: 400px;font-size: larger; ">
                    <h3>'.$titre.'</h3><br>
                    <p>'.$contenu.'</p>
                </div>
                ');
        
        if(!$mail->send()){
          $message = '<div class="alert alert-danger text-center " role="alert">La réponse n\'a pas été envoyer à '.$resultatAfficheMsg['nom'].'</div>';
          echo 'Erreurs:'.$mail->ErrorInfo;
        }else{
          $message = '<div class="alert alert-success text-center " role="alert">La réponse a été envoyer à '.$resultatAfficheMsg['nom'].'</div>';
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
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Répondre Client</h4>
                        <?php if(isset($message)) echo $message ?>
                        <div>
                            <h4 class="m-4"> <span class=" text-bg-secondary">Sujet:</span> <?= $resultatAfficheMsg['sujet']?></h4>
                            <div class=" text-black m-4"><span class=" fw-bold">Message:</span> <?= $resultatAfficheMsg['contenu']?></div>
                        </div>
                        <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1" class=" form-label h3 text-uppercase">Titre de la réponse</label>
                                <input type="text" class="form-control" name="titre_rep" id="exampleInputName1" placeholder="Ville" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2" class=" form-label h3 text-uppercase">Contenu </label>
                                <textarea class=" form-control"name="contenu_rep" id="exampleInputName2" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary me-2"  name="envoyer_rep" value="Envoyer">
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

