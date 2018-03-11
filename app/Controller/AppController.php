<?php
namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**
 * Class AppController
 * Class intermediaire, propre à notre app contrairement au Core Controller
 */
class AppController extends Controller
{
    /**
     * @var string
     */
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Charge et instancie le modèle de la table
     * @param  string $model_name
     */
    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}
