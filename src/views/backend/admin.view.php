<div class="card shadow-lg col-md-6" style="margin: 1rem auto;">
    <div class="card-body">
        <h2 class="h3 mb-3 fw-normal">Feel like a writer ?</h2>
        <a href="?p=addArticle" class="w-100 btn btn-lg btn-secondary" type="submit">Write Article</a>
    </div>
</div>

<hr class="w-25" style="margin: 2rem auto"/>

<form action="?p=updateUser" method="post" class="card shadow-lg col-md-6" style="margin: 1rem auto;">
    <div class="card-body">

        <?php if (!empty($_GET['message'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['message']; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_GET['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_GET['success']; ?>
            </div>
        <?php endif; ?>

        <h2 class="h3 mb-3 fw-normal">New identity ?</h2>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="John" name="firstName"
                   value="<?= \Vendor\Utility::getLoggedUser()->getFirstName(); ?>"
                   required>
            <label for="floatingInput">First Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Doe" name="lastName"
                   value="<?= \Vendor\Utility::getLoggedUser()->getLastName(); ?>"
                   required>
            <label for="floatingInput">Last Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                   value="<?= \Vendor\Utility::getLoggedUser()->getEmail(); ?>"
                   disabled>
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-check form-switch mb-3 text-start">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="role" value="admin" <?= \Vendor\Utility::getLoggedUser()->isAdmin() ? 'checked' : '';?>>
            <label class="form-check-label" for="flexSwitchCheckDefault">Super Admin</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Change Password"
                   name="password"
                   required>
            <label for="floatingPassword">Change Password</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Verify Password"
                   name="verifyPassword"
                   required>
            <label for="floatingPassword">Verify Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Update Infos</button>
    </div>
</form>

