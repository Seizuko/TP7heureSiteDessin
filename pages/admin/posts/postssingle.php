<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'] && $_POST['titre'] && $_POST['contenu'])) {
			$res = $app->getTable('post')->update(
				$_POST['id'], 
				["titre"=>$_POST['titre'], 
				"contenu"=>$_POST['contenu']
				]);
			if ($res) {
				?>
				<div class="alert alert-success">Bien enregistré</div> 
				<?php
			}
		}
	}
	$post = $app->getTable('post')->find($_GET['id']);
	if ($post===false) {
		$app->notFound();
	}
	$app->titre = $post->titre;
?>

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<div class="col-md-2">
	
</div>
<div class="col-md-8" id="zoneAdmin">
<h2 id="modif_article" style="font-size: 2.5em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px;">Modifier votre article</h2>
<form method="post" action="admin.php?p=posts.single&id=<?= $post->id; ?>">
	<input type="hidden" name="id" value="<?= $post->id; ?>">
	<input class="form-control" type="text" name="titre" value="<?= $post->titre; ?>" style="margin-bottom: 20px;">
	<textarea class="form-control" name="contenu"  style="margin-bottom: 20px; height: 400px;" id="editor1"><?= $post->contenu; ?></textarea>
	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
	<input class="btn btn-warning" type="submit" name=""> </br><br>
	<a href="admin.php" id="buttonAction">Retour vers la page Admin</a>
</form>
</div>
<div class="col-md-4">
	
</div>

