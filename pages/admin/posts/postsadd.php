<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>



<?php

$date = date('Y-m-d');
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['titre'] && $_POST['contenu'] && $_POST['auteur'] && $_POST['date_creation'] && $_POST['img'])) {
			$req = $app->getTable('post')->create(
				["titre"=>$_POST['titre'], 
				"contenu"=>$_POST['contenu'],
				"auteur"=>$_POST['auteur'],
				"date_creation"=>$_POST['date_creation'],
				"img"=>$_POST['img']
				]);
			if ($req) {
				////message Flash
				header('location: admin.php?p=posts.edit');
				?>
				<div class="alert alert-success">Bien enregistré</div>
				<?php
			}
		}
	}
?>

<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<div class="col-md-4">
	
</div>
<div class="col-md-4"  id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px; margin-bottom: 20px;">Ajouter un article</h2>
<form method="post">
	<input type="hidden" name="id" value="">
	<input class="form-control" type="text" name="titre" value="" placeholder="Nouveau Titre" style="margin-bottom: 20px;">
	<!-- <input type="URL" name="img" placeholder="URL de l'image"  style="margin-bottom: 20px;"> -->
	<input class="form-control" type="file" name="img" accept="img/" style="margin-bottom: 20px;">
	<input type="hidden" name="auteur" value="<?= $_SESSION['Auth']?>">
	<textarea class="form-control" name="contenu" placeholder="Contenu Articles" id="editor1" rows="10" cols="80" style="margin-bottom: 20px;"></textarea>
	<script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
    <input type="hidden" name="date_creation" style="color: black; margin-bottom: 20px;" value="<?= $date ?>"><br>
	<input class="btn btn-warning" type="submit" name="" style="margin-bottom: 80px;">
</form>
<a href="admin.php"  id="buttonAction">Retour vers la page Admin</a>
</div>
<div class="col-md-4">
	
</div>

