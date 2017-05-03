<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class CommentaireTable extends Table
{

	public function lastByCommentaire($category_id, $one=false)
	{
		return $this->query(" SELECT commentaires.id AS commentaires_id,
									commentaires.commentaire,
									commentaires.articles_id,
									commentaires.auteurCommentaire,
									commentaires.users_id,
									users.image
								FROM commentaires
								LEFT JOIN articles
									ON articles_id = articles.id
								LEFT JOIN users
									ON commentaires.users_id = users.id
								WHERE articles.id = ?
								ORDER BY commentaires.id DESC
							", [$category_id], $one);
	}
}