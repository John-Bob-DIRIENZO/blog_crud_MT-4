<form method="post" class="card shadow-lg col-md-6" style="margin: 1rem auto;">
    <div class="card-body">

        <h1 class="h3 mb-3 fw-normal">Write a new article</h1>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Writing as</label>
            <input type="text" class="form-control" id="articleLoggedUser"
                   value="<?= \Vendor\Utility::getLoggedUser()->getFirstName(); ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="articleTitle" name="title" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea class="form-control" id="articleContent" name="content" rows="3"></textarea>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Post Article</button>
    </div>
</form>