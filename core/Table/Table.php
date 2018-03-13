<?php
namespace Core\Table;

use Core\Database\Database;

/**
 * Class Table
 * Modèle contenant les methodes de récupération
 */
class Table
{
    /**
     * @var string
     */
    protected $table;
    /**
     * @var object
     */
    protected $db;

    /**
     * Récupére le nom de la table
     * @param Database $db Injection de dépendance marche aussi avec l'enfant
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * Tout récupérer d'une table
     * @return array
     */
    public function getAll()
    {
        return $this->query('SELECT * FROM ' . $this->table );
    }

    /**
     * Trouver via l'id
     * @param  int $id
     * @return object
     */
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * @param int $id
     * @param array $fields
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $value) {
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * @param array $fields
     */
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $key => $value) {
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    /**
     * Extrait les valeurs d'un enregistrement avec un array
     * @param  mixed $key
     * @param  mixed $value
     * @return array
     */
    public function extract($key, $value)
    {
        $records = $this->getAll();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    /**
    * Récupére les requêtes
    * @param  string  $statement
    * @param  string  $attributes
    * @param  boolean $one Récupére une ou plusieurs lignes
    * @return array|object
    */
    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
        } else {
            return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
        }
    }
}
