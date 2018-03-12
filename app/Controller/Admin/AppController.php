<?php
// Class intermediaire, propre à notre app contrairement au Core Controller
namespace App\Controller\Admin;

use \App;
use \Core\Auth\DBAuth;

/**
 * Class AppController
 * Class intermediaire d'administration
 */
class AppController extends \App\Controller\AppController
{
    /**
     * @var int
     */
    protected $template = 'admin';

    public function __construct()
    {
        parent::__construct();
        // Authentification
        $app = App::getInstance();
        $auth = new DBAuth(App::getInstance()->getDB());
        if (!$auth->logged()) {
            $this->forbidden();
        }
    }

    /**
     * Détruit la session et renvoie à l'index
     */
    public function logOut()
    {
        session_start();
        session_destroy();
        header('location: index.php');
    }
}
