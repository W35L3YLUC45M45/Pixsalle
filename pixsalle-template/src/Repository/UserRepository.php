<?php

declare(strict_types=1);

namespace Salle\PixSalle\Repository;

use Salle\PixSalle\Model\User;

interface UserRepository
{
    public function createUser(User $user): void;
    public function getUserByEmail(string $email);
    public function updatePfp(string $email, string $pfp):void;
    public function updateUsername(string $email, string $username):void;
    public function updatePassword(string $email, string $pasword):void;
    public function updatePhone(string $email, int $phone):void;
    public function updateMembership(string $email, string $membership):void;
    public function updateMoney(string $email, float $money):void;
}
