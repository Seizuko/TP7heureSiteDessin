<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['titre'])) {
			$res = $app->getTable('category')->create(
				["titre"=>$_POST['titre'], 
				
				]);
			if ($res) {
				////message Flash
				header('location: admin.php?p=category.edit');
				?>
				<div class="alert alert-success">Bien enregistré</div> 
				<?php
			}
		}
	}

?>
<div class="col-md-4">
	
</div>
<div class="col-md-4">
<h2 id="add_cat">Ajouter une catégorie</h2>
<form method="post" >
	<input type="hidden" name="id" value="">
	<input class="form-control" type="text" name="titre" value="" placeholder="Nouveau Titre">
	<input class="btn btn-warning" type="submit" name="">
</form>
<a href="admin.php">Retour vers la page Admin</a>
</div>
<div class="col-md-4">
	
</div>