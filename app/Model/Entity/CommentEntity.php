<?php
namespace App\Model\Entity;

use Core\Entity\Entity;

/**
 * Class CommentEntity
 * Modèle stockant les résultats des methodes et gérant les accesseurs pour les attributs spéciaux des comments
 */
class CommentEntity extends Entity
{
    /**
     * @return string Url
     */
    public function getUrl()
    {
        return 'index.php?p=posts.comment&id=' . $this->id;
    }
}
