<?php $utilisateurs = App::getInstance()->getTable('User')->find($_SESSION['Id']); ?>
<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'admin'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>

<?php
    $app = App::getInstance();

    if ($_POST) {
        if (!empty($_POST['id'] && $_POST['titre'])) {
            $res = $app->getTable('category')->update($_POST['id'], ['titre'=>$_POST['titre']]);
            if ($res) {
                //message flash
                header('location: admin.php?p=category.edit');

            }
        }
    }

    $category = $app->getTable('category')->find($_GET['id']);
    if ($category===false) {
        $app->notFound();
    }
    $app->titre = $category->titre;
?>

<div class="col-md-4">
    
</div>
<div class="col-md-4">
<h2 id="modif_cat">Modifier le nom de votre catégorie</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $category->id; ?>">
    <input type="text" class="form-control" name="titre" value="<?= $category->titre; ?>">
    <input type="submit" class="btn btn-warning"> </br>
    <a href="admin.php">Retour vers la page Admin</a>
</form>
</div>
<div class="col-md-4">
    
</div>