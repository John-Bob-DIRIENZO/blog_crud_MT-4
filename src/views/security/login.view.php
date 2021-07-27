<form method="post" class="card shadow-lg col-md-6" style="margin: 1rem auto;">
    <div class="card-body">
        <?php if (!empty($_GET['message'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['message']; ?>
            </div>
        <?php endif; ?>

        <h1 class="h3 mb-3 fw-normal">Who are you ?</h1>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                   required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                   required>
            <label for="floatingPassword">Password</label>
        </div>
        <input type="hidden" name="comingFrom" id="comingFrom" value="<?= $_GET['comingFrom']; ?>">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
    </div>
</form>

