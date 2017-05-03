<?php if(isset($_SESSION['Auth'])): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php 

$utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']);


if (!empty($_POST['mail'])) {
$req=App::getInstance()->getTable('User')->update($_SESSION['Id'],[
 	'mail' => htmlspecialchars ($_POST['mail']),
]); 
if ($req) {
				header('location: index.php?p=utilisateurs.profil');
				}
}

if (!empty($_POST['image'])) {
$req=App::getInstance()->getTable('User')->update($_SESSION['Id'],[
 	'image' => htmlspecialchars($_POST['image']),
]);
if ($req) {
				header('location: index.php?p=utilisateurs.profil');
				}
} 	

if (!empty($_POST['password'])) {
$req=App::getInstance()->getTable('User')->update($_SESSION['Id'], ['password' => sha1(htmlspecialchars($_POST['password']))]);
if ($req) {
	header('location: index.php?p=utilisateurs.profil');
}
}


/*var_dump($images)*/
?>



<div class="row" style="width: 99%;">

	<div class="col-md-2"></div>


	<div class="col-md-8" id="pagePerso">
		<div class="row">

		<div class="col-md-3" id="imageProfilPerso">
			<img src="img/imageProfil/<?= $utilisateurs->image ?>.png">

			<button onclick="formImage()" id="buttonFormImage">Modifier mon image</button>
			<form action="" method="post" name="formulaire" id="formImage" class="formImageHidden">
				<?php foreach (App::getInstance()->getTable('Image')->all() as $image) : ?>
					<!-- <input name="image" type="image" value="<?= $image->images ?>" id="profil1" src="img/imageProfil/<?= $image->images ?>.png" width="30%"> -->
				<?php endforeach ?>

				<?php if($_SESSION['Auth'] == 'Seizuko'): ?>
					<input name="image" type="image" value="seizuko" id="profil1" src="img/imageProfil/seizuko.png" width="30%">
				<?php endif; ?>
				<?php if($_SESSION['Auth'] == 'CaptainFire03'): ?>
					<input name="image" type="image" value="Captainfire03" id="profil1" src="img/imageProfil/Captainfire03.png" width="30%">
				<?php endif; ?>
			</form>
		</div>

		<div class="col-md-9">
			<h1 id="pseudo">Bienvenue <?= $utilisateurs->name  ?></h1>
			<h6><span id="infoProfil">Date d'inscription :</span> <?= $utilisateurs->date_inscription_fr  ?></h6>
		</div>

	

		<div class="col-md-9" id="profilInfoPerso">
			<h6><span id="infoProfil">Vous êtes :</span> <?= $utilisateurs->membre_rang  ?></h6><br>
			<h6><span id="infoProfil">Date de naissance :</span> <?= $utilisateurs->date_naissance_fr  ?></h6><br>
			<h6><span id="infoProfil">Adresse mail :</span> <?= $utilisateurs->mail  ?></h6>
			<button onclick="formMail()" id="buttonFormMail">Modifier</button>

			<form action="" method="post" name="formulaire" id="formMail" class="formMailHidden">
				<input type="email" required="required" name="mail" placeholder="Nouvelle adresse Mail" onblur="verifMail(this)" data-errormessage='{"valueMissing": "Veuillez entrer une adresse mail valid"' style="float: left; width: 70%; color: black;">
				<button type="submit" id="buttonFormMail">Valider</button>
			</form>


			<h6><span id="infoProfil">Mot de passe</span> </h6>
			<button onclick="formPassword()" id="buttonFormMail">Modifier</button>
			<form action="" method="post" name="formulaire" id="formPassword" class="formPasswordHidden">
			<!--<h6 style="color: grey; font-size: 1em">Mot de passe actuel : </h6>
				 	<input type="password" name="password" placeholder="Mot de passe actuel" required="required" onblur="verifPassword(this)"><br>-->
				<h6 style="color: grey; font-size: 1em;">Nouveau mot de passe : </h6>
				<input type="password" name="password" placeholder="Nouveau mot de passe" required="required" onblur="verifPassword(this)"><br>
 				<input type="password" name="password_confirm" placeholder="Confirmer mot de passe" onblur="identiquePassword(this)" required="required">
 				<button type="submit" id="buttonFormMail">Valider</button>
			</form>
		</div>
	</div>


	<div class="col-md-12">
		

		
	</div>

</div>
<!-- Mettre en page les sessions -->
<!-- Un endroit pour mettre une photo de profil -->
<!-- Un endroit pour mettre serveur, niveau & classe du joueur -->

