<?php
namespace App\Entity;

use Core\Entity\Entity;
/**
* 
*/
class PostEntity extends Entity
{
	public function getUrl()
	{
		return 'index.php?p=posts.single&id='.$this->id;
	}
	public function getExtrait()
	{
		$html = '<p>'.substr($this->contenu, 0, 50).'...</p>';
		return $html;
	}
	
}
