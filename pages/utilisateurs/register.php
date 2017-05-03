<?php


$date = date('Y-m-d');

if (!empty($_POST)) {
if (isset($_POST['name'], $_POST['password'], $_POST['password_confirm'], $_POST['date_de_naissance'], $_POST['mail'], $_POST['date_inscription'])){
	if(empty($_POST['name']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['name'])){
			echo "Votre pseudo n'est pas valide (alpha_numerique)"; //Echo pour pseudo non valide
		}else{
	if(empty($_POST['password']) || $_POST['password']!=$_POST['password_confirm']){
			echo "Les mots de passe ne correspondent pas"; //Echo pour mot de passe non valide
		}else{
	if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			echo "Votre mail n'est pas valide."; //Echo pour mail non valide
		}else{
 	$req=App::getInstance()->getTable('User')->create([

 	'name' => htmlspecialchars($_POST['name']),
 	'password' => sha1((htmlspecialchars(PREFIX_SALT.$_POST['password'].SUFFIX_SALT))),
 	'mail' => htmlspecialchars($_POST['mail']),
 	'date_inscription' => htmlspecialchars($_POST['date_inscription']),
 	'date_de_naissance' => htmlspecialchars($_POST['date_de_naissance'])]);
 	if ($req) {
				header('location: index.php?p=Login');
				}
			}
		}
	}
 	}
 }
?>
 	



<div class="row" style="width: 99%;">
<div class="col-md-4"></div>

<div class="col-md-4" id="inscription">
 <h2>Inscription</h2>
 <form action="" method="post" name="formulaire"  onsubmit="return verifForm(this)" autocomplete="off">
 	<h3>Pseudonyme</h3>
 	<input type="text" name="name" placeholder="Votre Pseudo" onblur="verifPseudo(this)" required="required">
 	<h6 style="margin-top: -20px; color: grey;">Caractere autorisé :  Majuscules, minuscules, - , _ </h6> <br>
 	<h3>Adresse mail</h3>
 	<input type="email" required="required" name="mail" placeholder="Votre Mail" onblur="verifMail(this)" data-errormessage='{"valueMissing": "Veuillez entrer une adresse mail valid"'>
 	<h6 style="margin-top: -20px; color: grey; margin-bottom: 50px;">Veuillez saisir une adresse valide, une confirmation vous sera demandé</h6>
 	<h3>Mot de passe</h3>
 	<input type="password" name="password" placeholder="Votre mot de passe" required="required" onblur="verifPassword(this)"><br>
 	<input type="password" name="password_confirm" placeholder="Confirmer votre mot de passe" onblur="identiquePassword(this)" required="required"></br>
 	<h3>Date de naissance</h3>
 	<input type="date" name="date_de_naissance"><br>
 	<input type="hidden" name="date_inscription" value="<?= $date ?>">
 	<button type="submit">Valider</button>
 </form>
 </div>

 </div>


