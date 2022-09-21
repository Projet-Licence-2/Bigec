<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | bigec  </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <?php include('header.php');?>
      <!-- Sidebar Navigation end -->
      <div class="page-content">
         <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Modification Salle</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
              <div class="row">
                <div class="container  shadow text-white" style="margin-top: 100px; width:800px;">
                  <form class="modal-content" method="POST" enctype="multipart/form-data" action="">
                    <div class="modal-header p-4 pb-4 border-bottom-0 cotitle">
                        <h2 class="fw-bold mb-0" >Modification des  informations sur la salle</h2>
                    </div>			
                    <?php if(isset($message)) echo $message ?>
                    <div class="row from-group">
                      
                      <div class="form-floating mb-3 ">
                        <input type="number" class="form-control rounded-2" name="prix" id="floatingInput" placeholder="prix" required>
                        <label for="floatingInput" class=" mx-3 text-white">Prix</label>
                      </div>
                      <div class="form-floating mb-3 col-md-12 ">
                        <input type="text" class="form-control rounded-2" name="descrip" id="floatingInput" placeholder="descriptionr" required>
                        <label for="floatingInput" class=" mx-3 text-white">Description de la salle</label>
                      </div>
                      
                      <div class="form-floating mb-3 ">
                        <input class="w-100 fw-bold mb-2 btn btn-lg me-2 btn-info text-uppercase text-white" name="modifier" type="submit" value="Modifier" > 
                        
                      </div>                
				            </div>
			            </form>
	              </div>
          </div>
        </div>
      </section>
        
        
        
        
        
       
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>