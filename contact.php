<?php 
    session_start();
    if(isset($_POST['envoyer'])){
		$nom = htmlspecialchars($_POST['nom']);
		$email = htmlspecialchars($_POST['email']);
        $sujet = htmlspecialchars($_POST['sujet']);
        $message = htmlspecialchars($_POST['message']);
        if(empty($nom) || !preg_match('/[a-zA-Z]+/', $nom)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le nom !</div>';
        }
        elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner un email valide !</div>';
        }
        elseif(empty($sujet) || !preg_match('/[a-zA-Z]+/', $sujet)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le champ sujet ! </div>';
        }elseif(empty($message) || !preg_match('/[a-zA-Z0-9]+/', $message)){
            $message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le champ message ! </div>';
        }else{
            include_once('include/start_bdd.php');

            $ajoutMessage = $bigec->prepare('INSERT INTO t_contact(nom,email,sujet,contenu) VALUES (:nom,:email,:sujet,:contenu)');
            $ajoutMessage->bindValue(':nom',$nom);
            $ajoutMessage->bindValue(':email',$email);
            $ajoutMessage->bindValue(':sujet',$sujet);
            $ajoutMessage->bindValue(':contenu',$message);
            $resultatAjoutMessage = $ajoutMessage->execute();

            if($resultatAjoutMessage){
                $message = '<div class="alert alert-success text-center " role="alert">Message envoyé </div>';
            }
        }

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | CATALOGUE</title>
<!-- this framework bootstrap-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Nos style css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
</head>
<body>
    <?php include ("header.php"); ?>
    <div class="container-fluid p-0">
        <img  class=" img-fluid contact-bg" src="assets/images/contact.jpg" alt="contact">
    </div>

        <div class="container-fluid row col-md-12 mt-4 ms-1">
        <?php if(isset($message)) echo $message?>
            <h3> Adresse</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6074.041654920856!2d-13.714965306659233!3d9.511450956395187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xf1cd09165fb2f8f%3A0xced159547560a99!2zS2Fsb3VtLCBHdWluw6ll!5e0!3m2!1sfr!2s!4v1653840256669!5m2!1sfr!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container" style=" margin-top:60px;">
        <div class="row">
            <div class="col-md-8">
                <form class="" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-2" name="nom" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-2" name="email" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Adresse email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-2" name="sujet" id="floatingPassword" placeholder="sujet">
                        <label for="floatingPassword">Sujet</label>
                    </div>
                    <div class="form-label mb-3">
                        <textarea class="form-control" rows="10" name="message" placeholder="Tapez votre messange"></textarea>
                    </div>
                    
                    <input class="w-20 btn btn-lg rounded-2 btn-info float-end" name="envoyer" type="submit" value="Envoyer"> 
                </form>
            </div>
            <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-info text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                        <div class="card-body">
                            <p><i class=" fa fa-map-marker"></i> 300 Boulevard de Kaloum</p>
                            <p>75015 Conakry</p>
                            <p>Guinée</p>
                            <p>Mail:contact@bigec.com</p>
                            <p><i class=" fa fa-phone"></i> +224 666 66 66 66</p>

                        </div>

                    </div>               
            </div>
        </div>
    </div><br><br>
    <?php include("footer.php");?>


     <!--All page javascript-->
     <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.js"></script>
      <!--JQUERY -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/jquery/jquery.js"></script>
</body>
</html>