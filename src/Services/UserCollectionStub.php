<?php

namespace src\Services;

use src\Collections\UserCollection;

/**
 * Class UserCollectionStub
 * @package src\Services
 */
class UserCollectionStub
{
    /** @var UserStub */
    private $userStub;

    /**
     * UserCollectionStub constructor.
     * @param UserStub $userStub
     */
    public function __construct(UserStub $userStub)
    {
        $this->userStub = $userStub;
    }

    public function create()
    {
        $collection = new UserCollection();

        $collection
            ->add($this->userStub->create(1, 'Ivan', 21, 'm', 'Kiev'))
            ->add($this->userStub->create(2, 'Kate', 43, 'w', 'New York'))
            ->add($this->userStub->create(3, 'Michael', 30, 'm', 'Paris'))
            ->add($this->userStub->create(11, 'Mike', 18, 'm', 'London'))
        ;

        return $collection;
    }
}