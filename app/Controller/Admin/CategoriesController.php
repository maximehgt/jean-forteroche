<?php
namespace App\Controller\Admin;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class CategoriesController
 * Gère la logique d'administration des categories
 */
class CategoriesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    /**
     * Récupére la liste des categories et la passe à la view admin.categories.index
     * @param  string $success
     */
    public function index($success = '')
    {
        $items = $this->Category->getAll();
        $this->render('admin.categories.index', compact('items', 'success'));
    }

    /**
     * Ajoute une category
     */
    public function add()
    {
        $error = false;
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['title'])) {
                $result = $this->Category->create(['title' => $_POST['title'], 'date' => date('Y-m-d H:i:s')]);
                if ($result) {
                    return $this->index($success = 'add');
                }
            }
            $error = true;
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form', 'error'));
    }

    /**
     * Modifie une category
     */
    public function edit()
    {
        $error = false;
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['title'])) {
                $result = $this->Category->update($_GET['id'], ['title' => $_POST['title'], 'date' => date('Y-m-d H:i:s')]);
                return $this->index($success = 'edit');
            }
            $error = true;
        }
        $category = $this->Category->find($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form', 'error'));
    }

    /**
     * Supprime une category
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index($success = 'delete');
        }
    }
}
