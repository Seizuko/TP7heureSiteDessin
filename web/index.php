<?php
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = "home";
}
//BOUTON CONNECT
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if ($auth->logged()) {
	$connect = "Disconnect";
}else{
	$connect = "Login";
}
//FINISH
ob_start();

if ($page==='home') {
	require ROOT.'/pages/posts/home.php';
}elseif ($page==='about') {
	require ROOT.'/pages/posts/about.php';
}elseif ($page==='dessiner') {
	require ROOT.'/pages/posts/dessiner.php';
}elseif ($page==='galerie') {
	require ROOT.'/pages/posts/galerie.php';
}elseif ($page==='posts.single') {
	require ROOT.'/pages/posts/single.php';
}elseif ($page==='commentaire.delete') {
	require ROOT.'/pages/posts/deleteCom.php';
}elseif ($page==='commentaire.edit') {
	require ROOT.'/pages/posts/editCom.php';

}elseif ($page==='utilisateurs') {
	require ROOT.'/pages/utilisateurs/register.php';
}elseif ($page==='utilisateurs.profil') {
	require ROOT.'/pages/utilisateurs/profil.php';
}

elseif ($page==='forum') {
	require ROOT.'/pages/forum/index.php';
}elseif ($page==='forum.category') {
	require ROOT.'/pages/forum/category.php';
}elseif ($page==='forum.single') {
	require ROOT.'/pages/forum/single.php';
}

elseif ($page==='Login') {
	require ROOT.'/pages/users/login.php';
}
elseif ($page==='Disconnect') {
	require ROOT.'/pages/users/disconnect.php';
}

elseif ($page==='403') {
	require ROOT.'/pages/errors/403.php';
}elseif ($page==='404') {
	require ROOT.'/pages/errors/404.php';
}
$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 