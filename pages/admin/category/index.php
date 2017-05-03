<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
$category = App::getInstance()->getTable('category')->all();

?>


<h1>EDITION category</h1>


<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>TITRE</td>
			<td>ACTION</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($category as $category) : ?>
		<tr>
			
		<td><?= $category->id; ?></td>
		<td><?= $category->titre; ?></td>
		<td><a href="admin.php?p=category.single&id=<?=$category->id;?>"><button>edit</button>

<form method="post" action="admin.php?p=category.delete" style="display: inline-block;">
	<input type="hidden" name="id" value="<?= $category->id; ?>">
	<input class="btn btn-danger" type="submit" name="OK" value="Delete">
</form>
			</a>
		</td>


		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<a href="admin.php">Retour vers la page Admin</a>