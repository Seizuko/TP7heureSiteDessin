<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php

	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'])) {
			$res = $app->getTable('post')->delete($_POST['id']);
				

			if ($res) {
				
				header('location: admin.php?p=posts.edit');
			
			}
		}
	}


?>