<?php


namespace Controller;


use Model\ArticleManager;
use Vendor\Utility;

class ArticleController extends BaseController
{
    public function addArticle()
    {
        if (!empty($_POST) && Utility::isLoggedIn()) {
            $articleManager = new ArticleManager();
            $redirectRoute = $articleManager->addArticle([
                'userId' => Utility::getLoggedUser()->getId(),
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);

            header('Location: ?p=show&articleId=' . $redirectRoute);
            exit();
        }

        $this->setView('backend/addArticle.view.php');
        $this->setTitle('Write a new article');
        return $this->render();
    }

    public function deleteArticle(): void
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($_GET['articleId']);

        if ($article !== null && Utility::isLoggedIn() && Utility::getLoggedUser()->haveArticleRights($article)) {

            $articleManager->deleteArticle($article);

            header('Location: ?p=');
            exit();
        }

        $redirectRoute = $article->getId();
        header('Location: ?p=show&articleId=' . $redirectRoute);
        exit();
    }
}