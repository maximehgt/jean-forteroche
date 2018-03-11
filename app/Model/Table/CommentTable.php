<?php
namespace App\Model\Table;

use Core\Table\Table;

/**
 * Class CommentTable
 * Modèle contenant les methodes de récupération  des enregistrements sur les comments
 */
class CommentTable extends AppTable
{
  /**
   * @var string
   */
    protected $table = 'comments';

    /**
     * Récupère les derniers commentaires
     * @return array
     */
    public function getAll() {
        return $this->query("SELECT comments.id, comments.pseudo, comments.content, comments.date, comments.signal_count, posts.title as title , categories.title AS category FROM " . $this->table . " LEFT JOIN posts ON comments.post_id = posts.id LEFT JOIN categories ON categories.id = category_id ORDER BY date DESC");
    }

    /**
     * Récupère les derniers commentaires de l'article demandé
     * @param  int $id
     * @return array
     */
    public function lastByComments($id)
    {
        return $this->query("SELECT id, pseudo, content, date, post_id  FROM " . $this->table . " WHERE post_id = ? ORDER BY date DESC", [$id]);
    }

    /**
     * Récupère le nombre de signalement pour un commentaire demandé
     * @param  int $id
     * @return int
     */
    public function findCount($id)
    {
        return $this->query("SELECT signal_count FROM " . $this->table . " WHERE id = ?", [$id], true);
    }
}
