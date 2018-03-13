<?php
namespace Core\Entity;

use Core\Entity\Entity;

/**
 * Class Entity
 * Modèle stockant les résultats des methodes et gérant les accesseurs pour des attributs spéciaux
 */
class Entity
{
    // Fonction magique
    /**
     * Appelle __get si jamais la variable n'existe pas, simplifie l'écriture des getter
     * @param  string $key
     * @return string Url
     */
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
