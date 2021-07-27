<?php


namespace Controller;


use Model\User;
use Model\UserManager;
use Vendor\Utility;

class SecurityController extends BaseController
{
    public function login()
    {
        if (empty($_POST)) {
            $this->setView('security/login.view.php');
            $this->setTitle('Please Log In');
            return $this->render();
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($_POST['email']);

        if ($user !== null && password_verify($_POST['password'], $user->getPassword())) {
            //$_SESSION['loggedUser'] = serialize($user);
            self::logUser($user);

            empty($_GET['comingFrom']) ? $redirectRoute = '?p=' : $redirectRoute = '?p=' . $_GET['comingFrom'];

            header('Location: ' . $redirectRoute);
            exit();
        } elseif ($user === null) {
            header('Location: ?p=login&message=No user found !');
            exit();
        } elseif ($user !== null && !password_verify($_POST['password'], $user->getPassword())) {
            header('Location: ?p=login&message=Wrong Password');
            exit();
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?p=');
        exit();
    }

    public function signup()
    {
        if (empty($_POST)) {
            $this->setView('security/signup.view.php');
            $this->setTitle('Please Log In');
            return $this->render();
        }

        if (Utility::userExists($_POST['email'])) {
            header('Location: ?p=signup&message=This user already exists');
            exit();
        } elseif ($_POST['password'] !== $_POST['verifyPassword']) {
            header('Location: ?p=signup&message=The passwords are not identical');
            exit();
        } elseif (!Utility::userExists($_POST['email']) && ($_POST['password'] === $_POST['verifyPassword'])) {
            $userManager = new UserManager();
            $newUser = $userManager->createNewUser([
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ]);

            //$_SESSION['loggedUser'] = serialize($newUser);
            self::logUser($newUser);

            header('Location: ?p=');
            exit();
        }

    }

    public static function logUser(User $user): void
    {
        $_SESSION['loggedUser'] = serialize($user);
    }

    public function updateUser()
    {
        if (!empty($_POST) && Utility::isLoggedIn() && $_POST['password'] === $_POST['verifyPassword']) {

            $_POST['role'] === 'admin' ? $role = ['ROLE_ADMIN'] : $role = null;

            $userManager = new UserManager();
            $updatedUser = $userManager->updateUser([
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'email' => Utility::getLoggedUser()->getEmail(),
                'roles' => $role,
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ]);

            SecurityController::logUser($updatedUser);

            header('Location: ?p=admin&success=Your infos are now updated');
            exit();
        }
        elseif ( !empty($_POST) && Utility::isLoggedIn() && $_POST['password'] !== $_POST['verifyPassword'] ) {
            header('Location: ?p=admin&message=The passwords are not identical');
            exit();
        }
    }
}