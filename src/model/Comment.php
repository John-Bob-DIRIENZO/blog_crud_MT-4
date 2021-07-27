<?php


namespace Model;


class Comment extends Entity
{
    private $id;
    private $userId;
    private $articleId;
    private $publisedAt;
    private $content;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param mixed $articleId
     */
    public function setArticleId($articleId): void
    {
        $this->articleId = $articleId;
    }

    /**
     * @return mixed
     */
    public function getPublisedAt()
    {
        return $this->publisedAt;
    }

    /**
     * @param mixed $publisedAt
     */
    public function setPublisedAt($publisedAt): void
    {
        $this->publisedAt = $publisedAt;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getAuthor(): User
    {
        $manager = new UserManager();
        return $manager->getUserById($this->userId);
    }
}