<?php
namespace App\Model\Entity;

use Core\Entity\Entity;

/**
 * Class PostEntity
 * Modèle stockant les résultats des methodes et gérant les accesseurs pour les attributs spéciaux des posts
 */
class PostEntity extends Entity
{
    /**
     * @return string Url
     */
    public function getUrl()
    {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

}
