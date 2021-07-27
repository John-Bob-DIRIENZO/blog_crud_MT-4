<?php


namespace Model;


class ArticleManager extends AbstractManager
{
    public function getArticleById($id): ?Article
    {
        $query = $this->db->prepare('SELECT * FROM article WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        $articleDatas = $query->fetchAll(\PDO::FETCH_ASSOC)[0];

        if (empty($articleDatas)) {
            return null;
        }

        return new Article($articleDatas);
    }

    public function getAllArticles(bool $orderASC): array
    {
        $articles = [];

        if ( $orderASC ) {
            $query = $this->db->query('SELECT * FROM article LIMIT 10');
        } else {
            $query = $this->db->query('SELECT * FROM article ORDER BY id DESC LIMIT 10');
        }

        while ( $articleDatas = $query->fetch(\PDO::FETCH_ASSOC) ) {
            $articles[] = new Article($articleDatas);
        }

        return $articles;
    }

    public function addArticle($articleDatas): ?int
    {
        $query = $this->db->prepare('INSERT INTO article (userId, title, content) VALUES (:userId, :title, :content)');
        $query->bindValue(':userId', $articleDatas['userId'], \PDO::PARAM_INT);
        $query->bindValue(':title', htmlspecialchars($articleDatas['title']), \PDO::PARAM_STR);
        $query->bindValue(':content', nl2br(htmlspecialchars($articleDatas['content'])), \PDO::PARAM_STR);

        $query->execute();

        return $this->db->lastInsertId();
    }

    public function deleteArticle(Article $article): bool
    {
        $delComs = $this->db->prepare('DELETE FROM comment WHERE articleId = :id');
        $delComs->bindValue(':id', $article->getId(), \PDO::PARAM_INT);
        $delComs->execute();

        $query = $this->db->prepare('DELETE FROM article WHERE id = :id');
        $query->bindValue(':id', $article->getId(), \PDO::PARAM_INT);
        return $query->execute();
    }
}