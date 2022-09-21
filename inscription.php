<?php

use PHPMailer\PHPMailer\PHPMailer;

	session_start();
	
	if(isset($_POST['validation'])){
		
		$prenom = htmlspecialchars($_POST['prenom']);
		$nom = htmlspecialchars($_POST['nom']);
		$adresse = htmlspecialchars($_POST['adresse']);

        #les verifications des champs 
        if(empty($prenom) || !preg_match('/[a-zA-Z]+/', $prenom)){
            $message = $nom;
        }
		elseif(empty($nom) || !preg_match('/[a-zA-Z]+/', $nom)){
			$message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le nom !</div>';
		}
		elseif(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner un email valide !</div>';
		}
		elseif(empty($adresse)){
			$message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le champ adresse ! </div>';
		}
		elseif(isset($_POST['numero']) && !preg_match('/[0-9]+/', $_POST['numero']))
		{
			$message = '<div class="alert alert-danger text-center " role="alert">Veuillez renseigner le champ numero</div>';
		}
		elseif(!empty($_POST['motdepasse1']) && !($_POST['motdepasse1']==$_POST['motdepasse2'])){
			$message = '<div class="alert alert-danger text-center " role="alert">le mot de passe saisie de correspond pas</div>';
		}
		else{
			extract($_POST);
			include_once("include/start_bdd.php");

			//verification si le client est deja inscrit dans la base de donnnee
			$verificationDeAjoutClient = $bigec->prepare('SELECT * FROM t_client WHERE email=:email');
			$verificationDeAjoutClient->bindValue(':email',$email);
			$verificationDeAjoutClient->execute();
			$resulatatVerification= $verificationDeAjoutClient->fetch();

			if($resulatatVerification){
				$message = '<div class="alert alert-danger text-center " role="alert">L\'adresse email que vous avez renseigner existe déja</div>';
			}else{
			require_once 'fonction/fonction.php';

			// pour crypter le mot de passe en quelque sort le mot de passe 
			$motDePasse = password_hash($_POST['motdepasse1'], PASSWORD_DEFAULT);	
			$jeton = jetonAleatoire(40);
			#prepare de la requete prepare pour ajouter les info du client dans la basse de donnée		
			$ajouteInformationClient = $bigec->prepare('INSERT INTO t_client(prenom,nom,email,adresse,numero,mdp,jeton) 
			VALUES(:prenom, :nom,:email,:adresse,:numero,:mdp,:jeton)');
			$ajouteInformationClient->bindValue(':prenom',$prenom);
			$ajouteInformationClient->bindValue(':nom',$nom);
			$ajouteInformationClient->bindValue(':email',$email);
			$ajouteInformationClient->bindValue(':adresse',$adresse);
			$ajouteInformationClient->bindValue(':numero',$numero); 
			$ajouteInformationClient->bindValue(':mdp',$motDePasse);
			$ajouteInformationClient->bindValue(':jeton',$jeton);
			$resultatAjoutInformationClient = $ajouteInformationClient->execute();
			if($resultatAjoutInformationClient){
				require_once "vendor/autoload.php";
			  
				$mail =new PHPMailer();

				$mail ->isSMTP();
				$mail->Host='in-v3.mailjet.com';
				$mail->SMTPAuth = true;
				$mail->Username='3bfeea3568d4e5b57e85092af7e72800';
				$mail->Password='73bada90bac9bd308d03d7d9a36dda01';
				$mail->SMTPSecure ='tls';
				$mail->Port=587;
				
				$mail->setFrom('camaraabdoulaye.9870@gmail.com', 'BIGEC CONFIRMATION DE L\'INSCRIPTION');
				$mail->addAddress($_POST['email']);
				
				$mail->isHTML(true);
				
				$mail->Subject ='Confirmez votre compte';
                $mail->Body=
                '  
                <div class="mail" style=" margin: auto ; width: 400px; height: 400px;font-size: larger; ">
                    <h3">Confirmation de l\'addresse email</h3><br>
                    <p>Bonjour '.$_POST['nom'].' '.$_POST['prenom'].'<br> <br>
                    Heureux de vous avoir à bord.<br><br>Veuillez confirmer votre adresse e-mail en cliquant sur le button ci-dessous:</p><br>
                    <button style="height: 30px; width: 150px;text-decoration:none; background: orange;color: white;border-radius: 50px;padding: 2px;font-size: 15px;">
                            <a href="http://localhost/bigec/verification.php?email='.$_POST['email'].'&jeton='.$jeton.'" style=" color: white; font-weight:bold; text-decoration:none; ">Confirmation</a>
                    </button>
                </div>
                ';
				
				if(!$mail->send()){
					echo "Mail non envoyé";
					echo 'Erreurs:'.$mail->ErrorInfo;
				}else{
					$message = '<div class="alert alert-success text-center " role="alert">Afin de vous connecter avec votre compte veuillez valider votre inscription dans votre boite email</div>';
				}
			
				
			}

		
			
			
			  
			

			}

			

		}
    }
?>

<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGEC | INSCRIPTION</title>
       <!-- this framework bootstrap-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
		<!-- Nos style css-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!--Fontawesome-->
		<link rel="stylesheet" href="assets/css/fontawesome.css">
		
</head>
<body>
    <?php 
		include ("header.php");
		
	?>
	<div class="container form shadow " >
			<form class="modal-content" method="post">
				<div class="modal-header p-4 pb-4 border-bottom-0 cotitle">
						<h2 class="fw-bold mb-0" >INSCRIPTION</h2>
				</div>
				<?php if(isset($message)){echo $message;}?>
				<div class="row from-group">
					<div class="form-floating mb-3 col-md-7">
						<input type="text" class="form-control rounded-2 " name="prenom" id="floatingInput" placeholder="prenom">
						<label for="floatingInput" class=" mx-3">Prenom</label>
					</div>
					<div class="form-floating mb-3 col-md-5 ">
						<input type="text" class="form-control rounded-2" name="nom" id="floatingInput" placeholder="nom">
						<label for="floatingInput" class=" mx-3">Nom</label>
					</div>
					<div class="form-floating mb-3 ">
						<input type="email" class="form-control rounded-2" name="email" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput" class=" mx-3">Email</label>
					</div>
					<div class="form-floating mb-3 col-md-5 ">
						<input type="text" class="form-control rounded-2" name="adresse" id="floatingInput" placeholder="wanindarar">
						<label for="floatingInput" class=" mx-3">Adresse</label>
					</div>
					<div class="form-floating mb-3 col-md-7 ">
						<input type="number" class="form-control rounded-2" name="numero" id="floatingInput" placeholder="666 66 66 66">
						<label for="floatingInput" class=" mx-3">Numero de téléphone</label>
					</div>
					<div class="form-floating mb-3 ">
						<input type="password" class="form-control rounded-2" name="motdepasse1" id="floatingInput" placeholder="password">
						<label for="floatingInput" class=" mx-3">Mot de passe </i></label>
					</div>
					<div class="form-floating mb-3 ">
						<input type="password" class="form-control mb-3 rounded-2"  name="motdepasse2" id="floatingInput" placeholder="confirmation">
						<label for="floatingInput" class="mx-3 ">  Confirmer le mot de passe</label>
					</div>					
				</div>
				<input class=" fw-bold mb-2 btn btn-lg rounded-3 btn-info  " name="validation" type="submit" value="S'INSCRIRE">
						<hr class="my-3">
						<small class="text-muted cotext">Vous avez déja un compte bigec ?
           				 <a href="connexion.php">Connectez vous</a></small>
			</form>
</div>
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