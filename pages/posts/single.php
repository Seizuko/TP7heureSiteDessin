<?php

	if ($_POST) {
		if (!empty($_POST['commentaire'] && $_POST['articles_id'] && $_POST['auteurCommentaire'])) {
			$req = $app->getTable('commentaire')->create(
				["commentaire"=>htmlspecialchars($_POST['commentaire']),
				"articles_id"=>htmlspecialchars($_POST['articles_id']),
				"users_id"=>htmlspecialchars($_POST['users_id']),
				"auteurCommentaire"=>htmlspecialchars($_POST['auteurCommentaire'])
				]);
			if ($req) {
				////message Flash
				?>
				<div class="alert alert-success">Bien enregistré</div>
				<?php
			}
		}
	}
	$app = App::getInstance();
	$post = $app->getTable('post')->find($_GET['id']);
	if ($post===false) {
		$app->notFound();
	}
	$lastCom = $app->getTable('commentaire')->lastByCommentaire($_GET['id']);
	$delCom = $app->getTable('commentaire')->all();
	$app->titre = $post->titre;

if(isset($_SESSION['Auth'])){
	$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);
}
?>

<div class="col-md-1"></div>
<div class="col-md-7" id="grosArticle">
	<h1 id="grostitre_article"><?= $post->titre; ?></h1>
	<img src="img/<?=$post->img?>">
	<div class="texteGrosArticle">
	<p><?= $post->contenu; ?></p>
	<br><br>
	<h6 style="color: grey;">Article posté par <?= $post->auteur ?> </h6>
	</div>
	
	<div class="commentaire">
	<div id="scroll"></div>
	<h4 style="font-family: 'Amatic SC', cursive;color: black;">Commentaire(s) :</h4>

	<div id="commentaire">
	

	<?php foreach ($lastCom as $last) : ?>
	<span>
	<div class="commentairePersonne">
	<?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté Admin affiche Panel Admin, sinon affiche rien -->
          <?php if($utilisateurs->membre_rang == 'admin'): ?>
    <a href="index.php?p=commentaire.edit&id=<?=$last->commentaires_id;?>" ><button class="buttonComDelete" style="float: right; margin-left:5px; ">Edit</button></a>
	<form action="index.php?p=commentaire.delete" method="post" class="formComDelete">
		<button class="buttonComDelete" type="submit" value="<?=$last->commentaires_id?>" name="id">X</button>
	</form>
	<?php else : ?><?php endif; ?>
       <?php else : ?>
       <?php endif; ?>
	<div class="col-md-1" id="imageProfilPerso" style="margin-right: 10px;">
	<img src="img/imageProfil/<?= $last->image ?>.png">
	</div>
	<h5><?= $last->auteurCommentaire ?></h5>
	<p><?= $last->commentaire ?></p>
	</div>
	</span>
	
	<?php endforeach; ?>
	</div>
	</div>





<?php if(isset($_SESSION['Auth'])): ?> <!-- Si connecté affiche form commentaire, sinon affiche Redirection -->
        <div class="commentaireTexte">
			<h2>Ajouter un commentaire</h2>
				<form method="post" action="index.php?p=<?php echo $_GET['p'] ?>&id=<?= $_GET['id'] ?>">
					<input type="hidden" name="auteurCommentaire" value="<?= $_SESSION['Auth']?>">
					<textarea class="form-control" name="commentaire" placeholder="Ajouter votre commentaire" ></textarea>
					<input type="hidden" name="articles_id" value="<?= $_GET['id'] ?>">
					<input type="hidden" name="users_id" value="<?= $_SESSION['Id'] ?>">
					<input class="btn btn-warning" type="submit" name="" style="margin-top: 20px;">
				</form>
		</div>
        <?php else : ?>
          	<p style="color: white">Je vous invite à vous connecter, si vous voulez poster un commentaire. <a href="index.php?p=Login">>> Connexion <<</a></p>
          	<p style="color: white">Si vous n'êtes pas inscrit, je vous invite à le faire ici <a href="index.php?p=utilisateurs">>> Inscription <<</a></p>
        <?php endif; ?>
</div>

<div class="col-md-1"></div>
	<div class="col-md-2" style="padding: 0;">
	<div id="colonneGauche">
		<h3 class="actu">Articles récents</h3>
		<?php foreach (App::getInstance()->getTable('post')->lastRecent() as $post) : ?>
			<a href="<?= $post->Url ?>"><div class="fondRecent">
				<h5><a href="<?= $post->Url ?>"> <?= $post->titre ?> </a></h5>
				<div class="imageArticleRecent"><img src="img/<?=$post->img?>"></div>
				<p>Article posté par <?= $post->auteur ?> <br> Le <?= $post->date_creation_fr ?></p>
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

	

