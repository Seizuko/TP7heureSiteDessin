<?php
use Core\Auth\DBAuth;
$app2 = App::getInstance();
$auth2 = new DBAuth($app2->getDb());

if ($auth2->logged()){
	header("location: admin.php");
}
?>



<div class="row" style="width: 99%;">
<div class="col-md-4">
	
</div>
<div class="col-md-4  log">
<h2 id="titre_log">Connexion</h2>
<form method="Post" action="admin.php" class="formLogin">
<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
<br>
<input type="password" class="form-control" name="password" placeholder="Mot de Passe">	
<br>
<button class="buttonLogin" type="submit">Valider</button>
</div>
<div class="col-md-4">
	
</div>
</div>
</form>