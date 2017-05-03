<div class="col-md-1"></div>
<div class="row">

<div class="col-md-10">
<h1 style="text-align: center; font-family: 'Amatic SC', cursive; font-size: 75px;margin-bottom: 50px; border-bottom:1px solid black;">Galerie de dessin</h1>
<?php foreach (App::getInstance()->getTable('post')->last() as $post) : ?>
	<div class="col-md-4">
	<div class="imageGalerie divGalery"><img id="noonecares" src="img/<?=$post->img?>"></div>
	</div>
<?php endforeach; ?>
</div>
</div>