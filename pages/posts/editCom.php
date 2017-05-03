<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'] && $_POST['commentaire'])) {
			$res = $app->getTable('commentaire')->update(
				$_POST['id'], 
				["commentaire"=>$_POST['commentaire']
				]);
			if ($res) {
				?>
				<div class="alert alert-success">Bien enregistré</div> 
				<?php
			}
		}
	}
	$post = $app->getTable('commentaire')->find($_GET['id']);
	if ($post===false) {
		$app->notFound();
	}
?>

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<div class="col-md-2">
	
</div>
<div class="col-md-8" id="zoneAdmin">
<h2 id="modif_article" style="font-size: 2.5em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px;">Modifier le commentaire</h2>
<form method="post" action="">
	<input type="hidden" name="id" value="<?= $post->id; ?>">
	<textarea class="form-control" name="commentaire"  style="margin-bottom: 20px; height: 400px;" id="editor1"><?= $post->commentaire; ?></textarea>
	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
	<input class="btn btn-warning" type="submit" name=""> </br><br>
	<a href="index.php" id="buttonAction">Retour vers la page d'accueil</a>
</form>
</div>
<div class="col-md-4">
	
</div>

