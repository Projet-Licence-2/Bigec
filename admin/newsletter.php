<?php

use PHPMailer\PHPMailer\PHPMailer;

session_start();
if(!isset($_SESSION['id_admin'])){
  header('Location:../connexion.php');
}else{
  if(isset($_POST["envoyer"])){
    $titre = htmlentities($_POST['titre']);
    $contenu = strip_tags($_POST['contenu']);

    include ('../include/start_bdd.php');

    $envoyeNewsAuxClient = $bigec->prepare('INSERT INTO t_newsletter(titre,contenu,id_admin) VALUES (:titre, :contenu,:id_admin)');
    $envoyeNewsAuxClient->bindValue(':titre',$titre);
    $envoyeNewsAuxClient->bindValue(':contenu',$contenu);
    $envoyeNewsAuxClient->bindValue(':id_admin',$_SESSION['id_admin']);
    $resultat = $envoyeNewsAuxClient->execute();

    if($resultat){
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
      
      $mail->setFrom('camaraabdoulaye.9870@gmail.com', 'NEWSLETTER');
      while($resultatCient = $client->fetch()){
        $mail->addAddress($resultatCient['email']);
      }
      
      $mail->isHTML(true);
      
      $mail->Subject =$_POST['titre'];
              $mail->Body=
              '  
              <div class="mail" style=" margin: auto ; width: 400px; height: 400px;font-size: larger; ">
                  <h3>'.$_POST['titre'].'</h3><br>
                  <p>'.$_POST['contenu'].'</p>
              </div>
              ';
      
      if(!$mail->send()){
        $message = '<div class="alert alert-danger text-center " role="alert">Le newsletter n\'a pas été envoyer aux clients</div>';
        echo 'Erreurs:'.$mail->ErrorInfo;
      }else{
        $message = '<div class="alert alert-success text-center " role="alert">Le newsletter a été envoyer aux clients</div>';
      }




      // $message = '<div class="alert alert-success text-center " role="alert">Le newsletter a été envoyer aux clients</div>';
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
                  <?php if(isset($message)) echo $message?>
                    <form class="forms-sample" method="post">
                      <div class="from-group">
                        <label for="titre">TITRE</label>
                        <input type="text" class=" form-control" id="titre" name="titre"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Contenu du message </label>
                        <textarea class="form-control" name="contenu" id="exampleTextarea1" rows="10" ></textarea>
                      </div>
                      <input type="submit" class="btn btn-primary me-2" name="envoyer" value="Envoyer">
                      <input class="btn btn-warning" type="reset" value="Annuler">
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

