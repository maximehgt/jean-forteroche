<?php
namespace App\Model\Table;

use Core\Table\Table;

/**
 * CLass AppTable
 * Class intermediaire, modèle contenant les methodes de récupération
 */
class AppTable extends Table
{
    /**
     * Récupérer toutes les lignes
     * @return array
     */
    public function getAll()
    {
        return $this->query('SELECT * FROM ' . $this->table . ' ORDER BY date DESC');
    }
}
