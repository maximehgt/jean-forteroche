<?php
namespace Core\Controller;

/**
 * Class Controller
 * Controller core, non propre à notre application
 */
class Controller
{
    /**
     * @var string
     */
    protected $viewPath;
    /**
     * @var string
     */
    protected $template;

    /**
     * Génére une view
     * @param  string $view
     * @param  array  $variables
     */
    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    /**
     * Renvoie un header forbidden
     */
    protected function forbidden()
    {
        ob_start();
        require($this->viewPath . 'errors/403.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/error.php');
        header('HTTP/1.0 403 Forbidden');
        exit();
    }

    /**
     * Renvoie un header not found
     */
    protected function notFound()
    {
        ob_start();
        require($this->viewPath . 'errors/404.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/error.php');
        header('HTTP/1.0 404 Not Found');
        exit();
    }

    /**
     * Trim puis check si empty
     * @param  string $variable
     * @return boolean
     */
    protected function strictEmpty($variable)
    {
        $value = trim($variable);
        if(isset($value) === true && $value === '') {
            return true;
        }
        else {
            return false;
        }
    }
}
