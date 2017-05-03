<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>


<?php 

$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['images'])) {
			$req = $app->getTable('Image')->create(
				["images"=>$_POST['images']
				]);
			if ($req) {
				////message Flash
				header('location: admin.php?p=users.image');
				?>
				<div class="alert alert-success">Bien enregistré</div>
				<?php
			}
		}
	}

 ?>

 <div class="col-md-4">
 	
 </div>

<div class="col-md-4"  id="zoneAdmin">
<h2  class="description" style="text-align: center; border-bottom:6px solid  rgb(199,211,29); padding-bottom: 20px; margin-bottom: 20px;">Ajouter une nouvelle photo de profil</h2>
 <form action="" method="post">
 	<input class="form-control" type="file" name="images">
 	<input type="submit" class="btn btn-danger">
 </form>
 </div>

 <div class="col-md-4">
 	
 </div>