<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<div class="row" style="width: 99%">
<div class="col-md-2"></div>

<div class="col-md-8" id="zoneAdmin">
	<div id="titre_admin">
		<h1>Panel Administrateur</h1>
		<?php if(isset($_SESSION['Auth'])): ?>
	        <h4 id="hello_admin">Bonjour <?= $_SESSION['Auth']; ?></h4>
	        <p id="hello_admin">Soyez le bienvenue sur votre espace d'administration !</p>
	        <?php else : ?>
	        <h4 id="hello_admin"> Vous êtes déconnecter.</h4>
	        <?php endif; ?>
	</div>

	<table class="table">
		<thead>
			<tr>
				<td class="description">Que voulez-vous faire ?</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td><p class="action">Ajouter un nouvel article !</p></td>
			<td style="padding: 30px; border: none;">
			<a href="admin.php?p=posts.add" id="buttonAction">Let's go !</a>
			</td>
			</tr>

			<tr>
				<td><p class="action">Editer votre article ou supprimer le.</p></td>
				<td style="padding: 30px; border: none;">
					<a href="admin.php?p=posts.edit" id="buttonAction">Let's go !</a>
				</td>
			</tr>
			<!-- <tr>
			<td><p class="action">Ajouter une nouvelle catégorie ?</p></td>
			<td style="padding: 30px; border: none;">
			<a href="admin.php?p=category.add" id="buttonAction">Let's go !</a>
			</td>
			</tr>

			<tr>
				<td><p class="action">Editer votre catégorie ou supprimer la !</p></td>
				<td style="padding: 30px; border: none;">
					<a href="admin.php?p=category.edit" id="buttonAction">Let's go !</a>
				</td>
			</tr> -->

			<tr>
				<td><p class="action">Liste de tout les utilisateurs :D</p></td>
				<td style="padding: 30px; border: none;">
					<a href="admin.php?p=users.index" id="buttonAction">Let's go !</a>
				</td>
			</tr>

			<!-- <tr>
				<td><p class="action">Ajouter une nouvelle photo de profil</p></td>
				<td style="padding: 30px; border: none;">
					<a href="admin.php?p=users.image" id="buttonAction">Let's go !</a>
				</td>
			</tr> -->
		</tbody>
	</table>
</div>


</div>