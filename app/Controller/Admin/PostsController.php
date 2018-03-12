<?php
namespace App\Controller\Admin;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class PostsController
 * Gère la logique d'administration des posts
 */
class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
    }

    /**
     * Récupére la liste des posts et la passe à la view admin.posts.index
     * @param  string $success
     */
    public function index($success = '')
    {
        $posts = $this->Post->getAll();
        $this->render('admin.posts.index', compact('posts', 'success'));
    }

    /**
     * Ajoute un post
     */
    public function add()
    {
        $error = false;
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['title']) && !$this->strictEmpty($_POST['content']) && !empty($_POST['category_id'])) {
                $result = $this->Post->create(['title' => $_POST['title'], 'content' => $_POST['content'], 'date' => date('Y-m-d H:i:s'), 'category_id' => $_POST['category_id']]);
                if ($result) {
                    return $this->index($success = 'add');
                }
            }
            $error = true;
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'title');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form', 'error'));
    }

    /**
     * Modifie un post
     * @param string $succes
     */
    public function edit()
    {
        $error = false;
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['title']) && !$this->strictEmpty($_POST['content']) && !empty($_POST['category_id'])) {
                $result = $this->Post->update($_GET['id'], ['title' => $_POST['title'], 'content' => $_POST['content'], 'date' => date('Y-m-d H:i:s'), 'category_id' => $_POST['category_id']]);
                if ($result) {
                  return $this->index($success = 'edit');
                }
            }
            $error = true;
        }
        $post = $this->Post->find($_GET['id']);
        if ($post === false) {
            $this->notFound();
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form', 'error'));
    }

    /**
     * Supprime un post
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index($success = 'delete');
        }
    }
}
