<?php


namespace Vendor;


use Model\User;
use Model\UserManager;

class Utility
{
    public static function isLoggedIn(): bool
    {
        $manager = new UserManager();
        return $manager->isLoggedIn();
    }

    public static function userExists(string $email): bool
    {
        $userManager = new UserManager();
        return $userManager->userExists($email);
    }

    public static function getLoggedUser(): ?User
    {
        return unserialize($_SESSION['loggedUser']);
    }
}