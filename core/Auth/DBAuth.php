<?php
namespace Core\Auth;

use Core\Database\Database;

/**
 * Class DBAuth gère l'authentification à la base de données
 */
class DBAuth
{
    /**
     * @var object
     */
    private $db;

    /**
     * Injection de la connexion à la base de données
     * @param Database $db [description]
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Autorise l'accès à la base de données
     * @param  string $username
     * @param  string $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username], null, true);
        if ($user) {
          if ($user->password === sha1($password)) {
              $_SESSION['auth'] = $user->id;
              return true;
          }
        }
        return false;
    }

    /**
     * Check si il y a une connexion active
     * @return boolean
     */
    public function logged()
    {
         return isset($_SESSION['auth']);
    }
}
