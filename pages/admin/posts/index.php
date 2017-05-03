<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
$posts = App::getInstance()->getTable('Post')->all();

?>


<div class="row" style="width: 99%">
<div class="col-md-2"></div>

<div class="col-md-8" id="zoneAdmin">


<h1 style="font-size: 4em; margin-bottom: 50px; border-bottom:6px solid  rgb(199,211,29);">Editez vos articles !</h1>


<table class="table">
	<thead>
		<tr>
			<td class="description">ID</td>
			<td class="description">TITRE</td>
			<td class="description">ACTION</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post) : ?>
		<tr>
			
		<td><?= $post->id; ?></td>
		<td  class="action"><?= $post->titre; ?></td>
		<td><a href="admin.php?p=posts.single&id=<?=$post->id;?>" ><button class="btn btn-danger">edit</button>

<form method="post" action="admin.php?p=posts.delete" style="display: inline-block;">
	<input type="hidden" name="id" value="<?= $post->id; ?>">
	<input class="btn btn-danger" type="submit" name="OK" value="Delete">
</form>
			</a>
		</td>


		</tr>
	<?php endforeach; ?>
	</tbody>
</table>


</div>