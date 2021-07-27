<?php


namespace Model;


class UserManager extends AbstractManager
{
    /**
     * @param $id
     * @return User|null
     */
    public function getUserById($id): ?User
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();

        $userDatas = $query->fetchAll(\PDO::FETCH_ASSOC)[0];

        if (empty($userDatas)) {
            return null;
        }

        return new User($userDatas);
    }

    public function getUserByEmail($email): ?User
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $query->bindValue(':email', $email, \PDO::PARAM_STR);
        $query->execute();

        $userDatas = $query->fetchAll(\PDO::FETCH_ASSOC);

        if (empty($userDatas)) {
            return null;
        }

        return new User($userDatas[0]);
    }

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        $users = [];
        $query = $this->db->query('SELECT * FROM user');
        while ( $userDatas = $query->fetch(\PDO::FETCH_ASSOC) ) {
            $users[] = new User($userDatas);
        }

        return $users;
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return (isset($_SESSION['loggedUser']) && unserialize($_SESSION['loggedUser']) instanceof User);
    }

    /**
     * @param string $email
     * @return bool
     */
    public function userExists(string $email): bool
    {
        if ($this->getUserByEmail($email) instanceof User) {
            return true;
        }
        return false;
    }

    /**
     * @param array $userDatas
     * @return User
     */
    public function createNewUser(array $userDatas): User
    {
        $query = $this->db->prepare('INSERT INTO user (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)');
        $query->bindValue(':firstName', $userDatas['firstName'], \PDO::PARAM_STR);
        $query->bindValue(':lastName', $userDatas['lastName'], \PDO::PARAM_STR);
        $query->bindValue(':email', $userDatas['email'], \PDO::PARAM_STR);
        $query->bindValue(':password', $userDatas['password'], \PDO::PARAM_STR);
        $query->execute();

        return $this->getUserByEmail($userDatas['email']);
    }

    public function updateUser(array $userDatas): User
    {
        $query = $this->db->prepare('UPDATE user SET firstName = :firstName, lastName = :lastName, roles = :roles, password = :password WHERE email = :email');
        $query->bindValue(':firstName', $userDatas['firstName'], \PDO::PARAM_STR);
        $query->bindValue(':lastName', $userDatas['lastName'], \PDO::PARAM_STR);
        $query->bindValue(':roles', serialize($userDatas['roles']), \PDO::PARAM_STR);
        $query->bindValue(':password', $userDatas['password'], \PDO::PARAM_STR);
        $query->bindValue(':email', $userDatas['email'], \PDO::PARAM_STR);
        $query->execute();

        return $this->getUserByEmail($userDatas['email']);
    }
}