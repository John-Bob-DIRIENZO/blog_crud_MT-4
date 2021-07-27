<?php

namespace Controller;

use Model\ArticleManager;
use Vendor\PDOFactory;

class FrontendController extends BaseController
{
    public function index()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticles(false);

        $this->setView('frontend/index.view.php');
        $this->setTitle('Tous les articles');
        $this->setVars([
            'articles' => $articles
        ]);
        return $this->render();
    }

    public function show($articleId)
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($articleId);

        if ( $article === null ) {
            header('Location: ?p=');
            exit();
        }

        $this->setView('frontend/show.view.php');
        $this->setTitle($article->getTitle());
        $this->setVars([
            'article' => $article
        ]);
        return $this->render();
    }
}