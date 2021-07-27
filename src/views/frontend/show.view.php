<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><?= $vars['article']->getTitle(); ?></h1>
        <p><small>
                Par : <?= $vars['article']->getAuthor()->getFirstName(); ?><br/>
                Le : <?= $vars['article']->getPublishedAt(); ?>
            </small></p>

        <?php if (\Vendor\Utility::isLoggedIn() && \Vendor\Utility::getLoggedUser()->haveArticleRights($vars['article'])) : ?>
            <button type="button" class="btn btn-danger btn-sm mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal-<?= $vars['article']->getId(); ?>">
                Delete Article
            </button>

            <!-- Modal -->
            <div class="modal fade text-start" id="exampleModal-<?= $vars['article']->getId(); ?>" tabindex="-1"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Really ?!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>You can't undo that you know...</p>
                            <p>And I'm sure someone, somewhere, would be delighted to read that article !</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                            </button>
                            <a href="?p=deleteArticle&articleId=<?= $vars['article']->getId(); ?>" type="button"
                               class="btn btn-danger">I know</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <p class="col-md-8 fs-5">
            <?= $vars['article']->getContent(); ?>
        </p>

    </div>
</div>

<hr/>

<h2 class="display-6 mb-3 text-center">What other think about that :</h2>

<?php
foreach ($vars['article']->getComments() as $comment) : ?>
    <div class="row align-items-md-stretch mb-3">
        <div class="col-md-6" style="margin: auto">
            <div class="h-100 p-2 text-center bg-light border rounded-3">
                <p><small>
                        Par : <?= $comment->getAuthor()->getFirstName(); ?><br/>
                        Le : <?= $comment->getPublisedAt(); ?>
                    </small></p>
                <p><?= $comment->getContent(); ?></p>

                <?php
                if (\Vendor\Utility::isLoggedIn() && \Vendor\Utility::getLoggedUser()->haveCommentsRights($comment)) : ?>

                    <button type="button" class="btn btn-danger btn-sm mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal-<?= $comment->getId(); ?>">
                        Delete Comment
                    </button>

                    <!-- Modal -->
                    <div class="modal fade text-start" id="exampleModal-<?= $comment->getId(); ?>" tabindex="-1"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Super supper sure ?!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>There is no way back !</p>
                                    <p>That insightful comment will be gone... forever...</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <a href="?p=deleteComment&commentId=<?= $comment->getId(); ?>" type="button"
                                       class="btn btn-danger">I know</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endforeach;


if (\Vendor\Utility::isLoggedIn()) : ?>

    <hr class="w-25" style="margin: 2rem auto"/>

    <form action="?p=addComment" method="post" class="card shadow-lg col-md-6" style="margin: 50px auto;">
        <div class="card-body">

            <h2 class="h3 mb-3 fw-normal">Something to say ?</h2>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Commenting as</label>
                <input type="text" class="form-control" id="commentLoggedUser"
                       placeholder="name@example.com"
                       value="<?= \Vendor\Utility::getLoggedUser()->getFirstName(); ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                <textarea class="form-control" id="commentContent" name="comment" rows="3"></textarea>
            </div>
            <input type="hidden" name="articleId" id="commentArticleId" value="<?= $_GET['articleId']; ?>">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Post Comment</button>
        </div>
    </form>

<?php endif; ?>



