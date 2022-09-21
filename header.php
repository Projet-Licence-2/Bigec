<nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="haut">
  <div class="container-fluid">
  <a id="haut" class="navbar-brand ms-4" href="index.php">Bi<sanp style="color: #0dcaf0;">GEC</sanp></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
        <li class="nav-item ms-5">
          <a class="nav-link active" id="haut" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-5" href="catalogue.php">Catalogue</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ms-5" href="about.php">A propos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link ms-5" href="contact.php">Contact</a>
        </li>
      </ul>
          <?php  
              if(isset($_SESSION['id']) && isset($_SESSION['email'])){?>
                <form class="d-flex">
                <a  class="btn btn-outline-warning me-2  rounded-2" href="reservation_client.php">Mes réservations<i class="fa fa-cart-plus"></i></a>
                  <a class="btn btn-outline-info me-2 rounded-2" href= "profil.php"><i class="bi bi-person-plus-fill"></i><?= $_SESSION['prenom']?></a>
                  <a  class="btn btn-outline-danger me-4  rounded-2" href="deconnexion.php"><i class=" fa fa-sign-out fa-fw"></i></a>
                </form>
            <?php  }else
              {?>
                <form class="d-flex">
                  <a class="btn btn-outline-info me-2 rounded-2" href= "inscription.php"><i class="fa fa-user-plus"></i> Inscription</a>
                  <a  class="btn btn-outline-success me-4  rounded-2" href="connexion.php"><i class="fa fa-user-secret"></i>  Connexion</a>
                </form>
         <?php }?>
    </div>
  </div>
</nav>