<?php

namespace src\Services;

use src\Models\User;

/**
 * Class UserStub
 * @package src\Services
 */
class UserStub
{
    /**
     * @param int $id
     * @param string $name
     * @param int $age
     * @param string $gender
     * @param string $address
     * @return User
     */
    public function create(int $id, string $name, int $age, string $gender, string $address)
    {
        $user = new User();
        $user
            ->setId($id)
            ->setName($name)
            ->setAge($age)
            ->setGender($gender)
            ->setAddress($address)
        ;

        return $user;
    }
}