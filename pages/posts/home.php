<section id="slider" class="container">
    <ul class="slider-wrapper">
    <li class="current-slide">
      <img src="img/myfurry-01.png" title="" alt="">

      <div class="caption">
        <h2 class="slider-title">Image</h2>
        <p>Ceci est un texte Random</p>
      </div>
    </li>

    <li>
      <img src="img/seizuHead-01.png" title="" alt="">

      <div class="caption">
        <h2 class="slider-title">Image</h2>
        <p>Ceci est un texte Random</p>
      </div>
    </li>

    <li>
      <img src="img/tokyoghoul-01.png" title="" alt="">

      <div class="caption">
        <h2 class="slider-title">Image</h2>
        <p>Ceci est un texte Random</p>
      </div>
    </li>

    <li>
      <img src="img/teste-01.png" title="" alt="">

      <div class="caption">
        <h2 class="slider-title">Image</h2>
        <p>Ceci est un texte Random</p>
      </div>
    </li>
    </ul>
    <!-- Sombras -->
    <div class="slider-shadow"></div>
    
    <!-- Controles de Navegacion -->
    <ul id="control-buttons" class="control-buttons"></ul>
  </section>
  

  

<div class="row" style="margin:0;padding:0;">
	<div class="col-md-1">
		
	</div>
	<div class="col-md-7" style="background:rgba(0,0,0,0.0);">
		<div class="row">
		<div id="scroll"></div>
		<div class="col-md-12"><h1 class="actu" style="padding-left: 30px;"><a class="actu2" href="index.php">Actualité</a><p>Css réalisé avec amour dans l'html & le css.</p></h1></div>
		</div>
		<div class="row" id="actuu">
		
		<?php foreach (App::getInstance()->getTable('post')->last() as $post) : ?>
			<span>
			<div class="row" style="margin-bottom: 10px; border:1px solid black; background: white; box-shadow: 5px 5px 10px grey;">
			<a href="<?= $post->Url ?>">
				<div class="imageArticle col-md-3"><img src="img/<?=$post->img?>"></div>
				<div class="contenuArticle">
					<h2 ><a class="titrecontenu" href="<?= $post->Url ?>"> <?= $post->titre ?> </a></h2>
					<h4 style="font-size: 10px;">Article posté par <?= $post->auteur ?> le <?= $post->date_creation_fr ?></h4>
					<p class="extrait"><?= $post->extrait ?></p>
				</div>
			</a>
			</div>
			</span>
		<?php endforeach; ?>












		</div>
	</div>
	<div class="col-md-1"></div>

	<div class="col-md-2" style="padding: 0;">
	<div id="colonneGauche">
		<h3 class="actu">Articles récents</h3>
		<?php foreach (App::getInstance()->getTable('post')->lastRecent() as $post) : ?>
			<a href="<?= $post->Url ?>"><div class="fondRecent">
				<h5><a href="<?= $post->Url ?>" class="titrecontenu"> <?= $post->titre ?> </a></h5>
				<a href="<?= $post->Url ?>" class="titrecontenu"><div class="imageArticleRecent"><img src="img/<?=$post->img?>"></div>
			</div></a>
		<?php endforeach; ?>
	</div>
	<div id="colonneGauche" style="margin-top: 15px;">
		<h3 class="actu" style="margin-bottom: 0px;">Inscriptions récentes</h3>
		<?php foreach (App::getInstance()->getTable('User')->lastUser() as $last) : ?>
			<h5 id="pseudoRecentInscrit"><?= $last->name ?></h5>
		<?php endforeach; ?>
		<h5 id="merci">Merci à vous !</h5>
	</div>

	</div>
</div>
