<?php

namespace src\Controllers;

use core\Controller\Controller;
use core\Router\NotFoundHttpException;
use core\Serializer;
use src\Models\User;
use src\Services\Security;
use src\Services\UserCollectionStub;
use src\Services\UserStub;

/**
 * Class UserController
 * @package src\Controllers
 */
class UserController extends Controller
{
    /**
     * Action for fetching list of users
     *
     * @return string
     */
    public function listAction()
    {
        $this->checkCredentials();
        $serializer = new Serializer();

        header('Content-Type: application/json');
        return $serializer->serialize($this->getCollection()->getModels());
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function getAction(int $id)
    {
        $this->checkCredentials();
        $serializer = new Serializer();

        $model = $this->getCollection()->findById($id);

        if ($model !== null) {
            header('Content-Type: application/json');
            return $serializer->serialize($model);
        }

        throw new NotFoundHttpException();
    }

    /**
     * @return \src\Collections\UserCollection
     */
    private function getCollection()
    {
        $userStub = new UserStub();
        $collectionStub = new UserCollectionStub($userStub);
        return $collectionStub->create();
    }

    private function checkCredentials()
    {
        $security = new Security($this->getConfig());
        $security->checkCredentials();
    }


}