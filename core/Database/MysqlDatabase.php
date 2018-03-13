<?php
namespace Core\Database;

use \PDO;

/**
* Class MysqlDatabase
* Permet de gérer les connexions à la base de données
*/
class MysqlDatabase extends Database
{

    /**
    * @var string Nom de la base de données
    */
    private $db_name;
    /**
    * @var string Nom de l'utilisateur
    */
    private $db_user;
    /**
    * @var string Mot de passe
    */
    private $db_pass;
    /**
    * @var string Serveur
    */
    private $db_host;
    /**
    * @var object PDO
    */
    private $pdo;

    /**
    * Prend les identifiants de connexion à la base de données et initialise les paramètres
    * @param string $db_name
    * @param string $db_user
    * @param string $db_pass
    * @param string $db_host
    */
    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
      $this->db_name =  $db_name;
      $this->db_user =  $db_user;
      $this->db_pass =  $db_pass;
      $this->db_host =  $db_host;
    }

    /**
    * Instancie $pdo
    * @return object
    */
    private function getPDO()
    {
        // Accesseur, permet de se connecter que lorsque c'est nécessaire
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            // Développement
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /**
    * Récupére les requêtes
    * @param  string  $statement
    * @param  string  $class_name
    * @param  boolean $one Récupére une ou plusieurs lignes
    * @return array|object  $datas
    */
    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);
        if (strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0) {
            return $req;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    /**
     * Prépare les requêtes
     * @param  string  $statement
     * @param  string  $attributes
     * @param  string  $class_name
     * @param  boolean $one
     * @return array|object  $datas
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if (strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0) {
            return $res;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }
}
