<?php

isset($_GET['p']) ? $path = $_GET['p'] : $path = null;

switch ($path) {
    // Frontend
    case null:
        $controller = new \Controller\FrontendController();
        $controller->index();
        break;

    case 'show':
        $controller = new \Controller\FrontendController();
        $controller->show($_GET['articleId']);
        break;

    // Admin
    case 'admin':
        $controller = new \Controller\AdminController();
        $controller->index();
        break;

    // Articles
    case 'addArticle':
        $controller = new \Controller\ArticleController();
        $controller->addArticle();
        break;

    case 'deleteArticle':
        $controller = new \Controller\ArticleController();
        $controller->deleteArticle();
        break;

    // Comments
    case 'addComment':
        $controller = new \Controller\CommentController();
        $controller->addComment();
        break;

    case 'deleteComment':
        $controller = new \Controller\CommentController();
        $controller->deleteComment();
        break;

    // Security
    case 'login':
        $controller = new \Controller\SecurityController();
        $controller->login();
        break;

    case 'logout':
        $controller = new \Controller\SecurityController();
        $controller->logout();
        break;

    case 'signup':
        $controller = new \Controller\SecurityController();
        $controller->signup();
        break;

    case 'updateUser':
        $controller = new \Controller\SecurityController();
        $controller->updateUser();
        break;

    default:
        $controller = new \Controller\ErrorController();
        $controller->Err404();
}