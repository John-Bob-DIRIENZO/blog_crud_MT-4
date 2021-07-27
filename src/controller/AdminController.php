<?php

namespace Controller;

use Model\UserManager;

class AdminController extends BaseController
{
    public function index()
    {
        $userManager = new UserManager();

        if ( $userManager->isLoggedIn() ) {
            $this->setView('backend/admin.view.php');
            $this->setTitle('Zone Admin');

            return $this->render();
        }

        header('Location: ?p=login&comingFrom=admin');
        exit();
    }
}