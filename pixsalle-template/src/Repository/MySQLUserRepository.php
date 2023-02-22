<?php

declare(strict_types=1);

namespace Salle\PixSalle\Repository;

use DateTime;
use PDO;
use Salle\PixSalle\Model\User;
use Salle\PixSalle\Repository\UserRepository;

final class MySQLUserRepository implements UserRepository
{
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    private PDO $databaseConnection;

    public function __construct(PDO $database)
    {
        $this->databaseConnection = $database;
    }

    public function createUser(User $user): void
    {
        $query = <<<'QUERY'
        INSERT INTO users(email, password, membership, money, createdAt, updatedAt)
        VALUES(:email, :password, 'cool', 30, :createdAt, :updatedAt)
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $email = $user->email();
        $password = $user->password();
        $createdAt = $user->createdAt()->format(self::DATE_FORMAT);
        $updatedAt = $user->updatedAt()->format(self::DATE_FORMAT);

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('password', $password, PDO::PARAM_STR);
        $statement->bindParam('createdAt', $createdAt, PDO::PARAM_STR);
        $statement->bindParam('updatedAt', $updatedAt, PDO::PARAM_STR);

        $statement->execute();


        $user = $this->getUserByEmail($email);
        $username = "user" . $user->id;
        $this->updateUsername($email, $username);
    }

    public function getUserByEmail(string $email)
    {
        $query = <<<'QUERY'
        SELECT * FROM users WHERE email = :email
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $statement->bindParam('email', $email, PDO::PARAM_STR);

        $statement->execute();

        $count = $statement->rowCount();
        if ($count > 0) {
            $row = $statement->fetch(PDO::FETCH_OBJ);
            return $row;
        }
        return null;
    }

    public function updatePfp(string $email, string $pfp):void{

    }

    public function updateUsername(string $email, string $username):void{
        $query = <<<'QUERY'
        UPDATE users SET username = :username, updatedAt = :updatedAt
        WHERE email = :email
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $updatedAt = new DateTime();
        $updatedAt = $updatedAt->format(self::DATE_FORMAT);

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('username', $username, PDO::PARAM_STR);
        $statement->bindParam('updatedAt', $updatedAt, PDO::PARAM_STR);

        $statement->execute();
    }

    public function updatePassword(string $email, string $password):void{
        $query = <<<'QUERY'
        UPDATE users SET password = :password, updatedAt = :updatedAt
        WHERE email = :email
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $updatedAt = new DateTime();
        $updatedAt = $updatedAt->format(self::DATE_FORMAT);

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('password', $password, PDO::PARAM_STR);
        $statement->bindParam('updatedAt', $updatedAt, PDO::PARAM_STR);

        $statement->execute();
    }

    public function updatePhone(string $email, int $phone):void{
        $query = <<<'QUERY'
        UPDATE users SET phone = :phone, updatedAt = :updatedAt
        WHERE email = :email
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $updatedAt = new DateTime();
        $updatedAt = $updatedAt->format(self::DATE_FORMAT);

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('phone', $phone, PDO::PARAM_STR);
        $statement->bindParam('updatedAt', $updatedAt, PDO::PARAM_STR);

        $statement->execute();
    }

    public function updateMembership(string $email, string $membership):void{
        $query = <<<'QUERY'
        UPDATE users SET membership = :membership, updatedAt = :updatedAt
        WHERE email = :email
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $updatedAt = new DateTime();
        $updatedAt = $updatedAt->format(self::DATE_FORMAT);

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('username', $username, PDO::PARAM_STR);
        $statement->bindParam('updatedAt', $updatedAt, PDO::PARAM_STR);

        $statement->execute();
    }

    public function updateMoney(string $email, float $money):void{
        $query = <<<'QUERY'
        UPDATE users SET money = :money, updatedAt = :updatedAt
        WHERE email = :email
        QUERY;

        $statement = $this->databaseConnection->prepare($query);

        $updatedAt = new DateTime();
        $updatedAt = $updatedAt->format(self::DATE_FORMAT);

        $statement->bindParam('email', $email, PDO::PARAM_STR);
        $statement->bindParam('money', $money, PDO::PARAM_STR);
        $statement->bindParam('updatedAt', $updatedAt, PDO::PARAM_STR);

        $statement->execute();
    }
}
