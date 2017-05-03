<?php
$date = date("d-m-Y");

if(isset($_SESSION['Auth'])){
$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= App::getInstance()->titre; ?></title>
                <!-- Bootstrap & materialize core CSS -->
      <link rel="stylesheet" type="text/css" href="frameworks/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <!--  <link rel="stylesheet" type="text/css" href="frameworks/materialize.min.css"> -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body>
<div id="iamtop"></div>





<a href="#"  id="scrollUpa"><img src="img/remonter.png" width="80" id="scrollUp" class="hidden" ></a>


<nav class="navbar navbar-inverse navbar-fixed-top" style="box-shadow: 0px 5px 10px grey;">
  <div class="container-fluid">
    <div class="navbar-header">

      <a class="navbar-brand" style="margin-left: 80px;" href="index.php">Accueil</a>
      <a class="navbar-brand" href="index.php?p=galerie">Galerie</a>
      <a class="navbar-brand" href="index.php?p=about">About me</a>
      <a class="navbar-brand" href="index.php?p=dessiner">Dessiner !</a>
    </div>
    <ul class="nav navbar-nav">
<!--       <li class="active"><a href="index.php">Accueil</a></li> -->
      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté Admin affiche Panel Admin, sinon affiche rien -->
          <?php if($utilisateurs->membre_rang == 'admin'): ?>
       <li><a href="admin.php"><span class="glyphicon glyphicon-lock"></span> Panel Admin</a></li>
          <?php else : ?><?php endif; ?>
       <?php else : ?>
       <?php endif; ?>

      <?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté affiche Bonjour Pseudo, sinon affiche Visiteur -->
        <li><a style="color: white;"><img src="img/imageProfil/<?= $utilisateurs->image?>.png" id="imageNav"> Bonjour <?= $_SESSION['Auth']; ?></a></li>
        <li><a href="index.php?p=utilisateurs.profil&name=<?= $_SESSION['Auth'] ?>">Mon Compte</a></li>
        <?php else : ?>
          <li><a style="color: white;"> Vous n'êtes pas connecté</a></li>
          <li><a href="index.php?p=utilisateurs"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
        <?php endif; ?>

      
      <li><a href="index.php?p=<?=$connect ?>"><span class="glyphicon glyphicon-log-in"></span>  <?= $connect ?></a></li>
    </ul>
  </div>
</nav>


<div class="header"> <!-- Div pour entete --> </div>


  

  <div class="container" style="margin: 0; padding: 0; width: 100%;">
      <div class="starter-template">
        <?= $content; ?>
      </div>

  </div><!-- /.container -->


<footer>
  <div class="row">
    <div class="col-md-4" id="footerArticle">
      
    </div>

    <div class="col-md-3" id="footerNavigation">
      <h6>Navigation</h6>
      <a href="index.php">Accueil</a><br>
      <?php if(isset($_SESSION['Auth'])): ?>
        <a href="index.php?p=utilisateurs.profil&name=<?= $_SESSION['Auth'] ?>">Mon Compte</a><br>
        <?php else : ?>
          <a href="index.php?p=utilisateurs">S'inscrire</a><br>
        <?php endif; ?>
        <a href="index.php?p=<?=$connect ?>"><?= $connect ?></a>
    </div>

    <div class="col-md-4" id="footerAPropos">
     

    </div>

    <div class="col-md-12" id="footerMentions">
      <p>Thème, design et code réalisés par Plein de gens</p>
    </div>
  </div>  
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/Paginate.js"></script>
<script type="text/javascript" src="js/script.js"></script>


<?php include 'navbar_mobile.php' ?>


<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

</body>
                <!-- SCRIPTS LOADS -->
<!-- <script type="text/javascript" hrel="scripts/bootstrap.min.js"></script>
     <script type="text/javascript" hrel="jquery-3.2.0.min.js"></script> -->
</html>
