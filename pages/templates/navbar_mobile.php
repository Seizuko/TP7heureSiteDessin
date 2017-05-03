
<!-- NAVBAR MOBILE UNIQUEMENT ! -->
<nav id="mobileNav" class="row" style="padding-top:10px;">
  <img onclick="navMobile()" id="mobileButton" src="img/menu.png" width="10">
</nav>

<div  id="navmobile" class="hidden">
   <div class="row" id="rowMobile">
       <?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté affiche Bonjour Pseudo, sinon affiche Visiteur -->
        <div class="col-xs-12 col-sm-12" id="pseudoNavMobile"><img src="img/imageProfil/<?= $utilisateurs->image?>.png" id="imageNav"> Bonjour <?= $_SESSION['Auth']; ?></div>
        <div class="col-xs-6 col-sm-6"><a href="index.php?p=utilisateurs.profil&name=<?= $_SESSION['Auth'] ?>">Mon Compte</a></div>
        <?php else : ?>
          <div class="col-xs-12 col-sm-12" id="pseudoNavMobile"> Vous n'êtes pas connecté</div>
          <div class="col-xs-6 col-sm-6"><a href="index.php?p=utilisateurs"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></div>
        <?php endif; ?>

        <div class="col-xs-6 col-sm-6"><a href="index.php?p=<?=$connect ?>"><span class="glyphicon glyphicon-log-in"></span>  <?= $connect ?></a></div>
   </div>
   <div class="row">
      <div class="col-xs-12 col-sm-12"><a href="index.php" id="liensNavMobile">Accueil</a></div>
      <div class="col-xs-12 col-sm-12"><a href="index.php?p=galerie" id="liensNavMobile">Galerie</a></div>
   </div>
</div>


