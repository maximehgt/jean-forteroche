<?php
namespace App\Model\Entity;

use Core\Entity\Entity;

/**
 * Class CategoryEntity
 * Modèle stockant les résultats des methodes et gérant les accesseurs pour les attributs spéciaux des categories
 */
class CategoryEntity extends Entity
{
    /**
     * @return string Url
     */
    public function getUrl()
    {
        return 'index.php?p=posts.category&id=' . $this->id;
    }
}
