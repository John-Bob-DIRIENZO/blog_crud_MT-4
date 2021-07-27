<h1 class="text-center">Tous les articles</h1>
<hr class="w-25" style="margin: 2rem auto"/>
<?php
foreach ($vars['articles'] as $article) {
    ?>
    <div class="row align-items-md-stretch justify-content-md-center mb-3 text-center">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2><?= $article->getTitle(); ?></h2>
                <p><small>
                        Par : <?= $article->getAuthor()->getFirstName(); ?><br/>
                        Le : <?= $article->getPublishedAt(); ?>
                    </small></p>

                <p><?= substr($article->getContent(), 0, 300); ?>...</p>

                <div>
                    <a href="?p=show&articleId=<?= $article->getId(); ?>" class="btn btn-outline-secondary"
                       type="button">Read
                        more</a>

                    <?php if (\Vendor\Utility::isLoggedIn() && \Vendor\Utility::getLoggedUser()->haveArticleRights($article)) : ?>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-<?= $article->getId(); ?>">
                            Delete Article
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-start" id="exampleModal-<?= $article->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                        <a href="?p=deleteArticle&articleId=<?= $article->getId(); ?>" type="button" class="btn btn-danger">I know</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>
    <?php
}