<?php


namespace Model;


class CommentManager extends AbstractManager
{
    public function getAllCommentsByArticleId($articleId): array
    {
        $comments = [];

        $query = $this->db->prepare('SELECT * FROM comment WHERE articleId = :articleId');
        $query->bindValue(':articleId', $articleId, \PDO::PARAM_INT);
        $query->execute();

        while ($commentData = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($commentData);
        }

        return $comments;
    }

    public function addComment($commentDatas): bool
    {
        $query = $this->db->prepare('INSERT INTO comment (userId, articleId, content) VALUES (:userId, :articleId, :content)');
        $query->bindValue(':userId', $commentDatas['userId'], \PDO::PARAM_INT);
        $query->bindValue(':articleId', $commentDatas['articleId'], \PDO::PARAM_INT);
        $query->bindValue(':content', nl2br(htmlspecialchars($commentDatas['content'])), \PDO::PARAM_STR);

        return $query->execute();
    }

    public function getCommentById(int $commentId): ?Comment
    {
        $query = $this->db->prepare('SELECT * FROM comment WHERE id = :id');
        $query->bindValue(':id', $commentId, \PDO::PARAM_INT);
        $query->execute();

        $commentData = $query->fetchAll(\PDO::FETCH_ASSOC)[0];

        if (empty($commentData)) {
            return null;
        }

        return new Comment($commentData);
    }

    public function deleteComment(Comment $comment): bool
    {
        $query = $this->db->prepare('DELETE FROM comment WHERE id = :id');
        $query->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);

        return $query->execute();
    }

}