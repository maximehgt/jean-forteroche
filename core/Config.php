<?php
namespace Core;

/**
 * Class Config gére la configuration de notre application
 */
class Config
{
    /**
     * @var array
     */
    private $_settings = [];
    /**
     * @var object
     */
    private static $_instance;

    /**
     * Instancie la class
     * @param  string $file
     * @return object $_instance
     */
    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    /**
     * Récupére le fichier config.php
     * @param string $file
     */
    public function __construct($file)
    {
        $this->_settings = require($file);
    }

    /**
     * Récupére les valeurs de l'instance
     * @param  string $key
     * @return string
     */
    public function get($key)
    {
        if (!isset($this->_settings[$key])) {
            return null;
        }
        return $this->_settings[$key];
    }
}
