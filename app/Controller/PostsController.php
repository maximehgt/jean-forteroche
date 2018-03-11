<?php
namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

/**
 * Class PostsController
 * Gère la logique des posts
 */
class PostsController extends AppController
{
    public function __construct()
    {
        // Preserve la logique du construct parent
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    /**
     * Récupére la liste des posts et la passe à la view post.index
     */
    public function index()
    {
        $posts = $this->Post->last();
        $categories = $this->Category->getAll();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    /**
     * Récupére la category associée à l'id et la passe à la view post.category
     */
    public function category()
    {
        $category = $this->Category->find($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $articles = $this->Post->firstByCategory($_GET['id']);
        if ($articles === false) {
            $this->notFound();
        }
        $categories = $this->Category->getAll();
        $this->render('posts.category', compact('articles', 'categories', 'category'));
    }

    /**
     * Récupére le comment associé à l'id et le passe à la view post.comment
     */
    public function comment()
    {
        $comment = $this->Comment->find($_GET['id']);
        if ($comment === false) {
            $this->notFound();
        }
        $this->render('posts.comment', compact('comment'));
    }

    /**
     * Ajoute un comment
     */
    public function addComment()
    {
        $state = '';
        $id = $_GET['id'];
        if (!empty($_POST)) {
            if (!$this->strictEmpty($_POST['pseudo']) && !$this->strictEmpty($_POST['content'])) {
                $result = $this->Comment->create(['pseudo' => $_POST['pseudo'], 'content' => $_POST['content'], 'date' => date('Y-m-d H:i:s'), 'post_id' => $_GET['id']]);
                if ($result) {
                    $state = 'success';
                    header('Location: index.php?p=posts.show&id=' . $_GET['id'] . '&state=' . $state);
                }
            } else {
                $state = 'error';
                header('Location: index.php?p=posts.show&id=' . $_GET['id'] . '&state=' . $state);
            }
        }
    }

    /**
     * Signale un comment
     */
    public function reportComment()
    {
        if (!isset($_SESSION['report'])) {
            $_SESSION['report'] = [];
        }
        // Limite le reporting à 3 par session et 1 par commentaire
        if (count($_SESSION['report']) < 3 && !in_array($_GET['id'], $_SESSION['report'])) {
            $countObject = $this->Comment->findCount($_GET['id']);
            $count = (int)$countObject->signal_count;
            $result = $this->Comment->update($_GET['id'], ['signal_count' => $count + 1]);
            if ($result) {
                array_push($_SESSION['report'], $_GET['id']);
            }
        } else {
            // Do nothing
        }
        header('Location: index.php?p=posts.show&id=' . $_GET['post_id']);
    }

    /**
     * Récupére le post lié à l'id et le passe à la view post.show
     */
    public function show()
    {
        $article = $this->Post->findWithCategory($_GET['id']);
        if ($article === false) {
            $this->notFound();
        }
        $comments = $this->Comment->lastByComments($_GET['id']);
        if ($comments === false) {
            $this->notFound();
        }
        $previous = $this->Post->previous($_GET['id']);
        $next = $this->Post->next($_GET['id']);
        $links;
        $form = new BootstrapForm($_POST);
        if (!$previous && !$next) {
            $this->render('posts.show', compact('article', 'comments', 'form'));
        } elseif (!$previous) {
            $this->render('posts.show', compact('article', 'comments', 'next', 'links', 'form'));
        } elseif (!$next) {
            $this->render('posts.show', compact('article', 'comments', 'previous', 'links', 'form'));
        } else {
            $this->render('posts.show', compact('article', 'comments', 'previous', 'next', 'links', 'form'));
        }
    }
}
