<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: rgba(44, 46, 41, 0.5);">  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
       <!--<li class="nav-item active">
          <a class="nav-link" href="index.php?action=listPostsMember">Accueil<span class="sr-only">(current)</span></a>
        </li>-->   
        <?php if(isset($_SESSION) AND isset($_SESSION['id_type']) AND $_SESSION['id_type'] == 1) { ?> 
        <li class="nav-item active">
          <a class="nav-link" href="index.php?action=listPostsMember">Accueil<span class="sr-only">(current)</span></a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=deconnexion">Deconnexion</a>
        </li>
      <?php }

       elseif(isset($_SESSION) AND isset($_SESSION['id_type'])  AND  $_SESSION['id_type'] == 2) { ?>
       <li class="nav-item active">
          <a class="nav-link" href="index.php?action=listPosts">Acceuil<span class="sr-only">(current)</span></a>
        </li>       
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=deconnexion">Se déconnecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=addPost">Ajouter un chapitre</a>
        </li>
      <?php } 

       else { ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?action=listPostsMember">Accueil<span class="sr-only">(current)</span></a>
        </li>   
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=loginView">Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=signinView">S'inscrire</a>
        </li>
      <?php } ?>
      </ul>        
    </div>
  </nav>