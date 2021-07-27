<?php


namespace Controller;


use Model\Comment;
use Model\CommentManager;
use Vendor\Utility;

class CommentController extends BaseController
{
    public function addComment()
    {
        if (!empty($_POST) && Utility::isLoggedIn()) {
            $commentManager = new CommentManager();
            $commentManager->addComment([
                'userId' => Utility::getLoggedUser()->getId(),
                'articleId' => $_POST['articleId'],
                'content' => $_POST['comment']
            ]);

            header('Location: ?p=show&articleId='.$_POST['articleId']);
            exit();
        }

        header('Location: ?p=');
        exit();
    }

    public function deleteComment()
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->getCommentById($_GET['commentId']);

        if ($comment !== null && Utility::isLoggedIn() && Utility::getLoggedUser()->haveCommentsRights($comment)) {

            $redirectRoute = $comment->getArticleId();

            $commentManager->deleteComment($comment);

            header('Location: ?p=show&articleId='.$redirectRoute);
            exit();
        }

        header('Location: ?p=');
        exit();
    }
}