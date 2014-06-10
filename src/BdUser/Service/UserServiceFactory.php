<?php

namespace BdUser\Service;

use Doctrine\ORM\EntityManager;
use BdUser\DoctrineUserProvider;
use BdUser\Entity\User;
use BdUser\Entity\UserDetail;
use BdUser\Entity\UserPhoneNumber;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use BdUser\Exception;

class UserServiceFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceManager
     * @throws Exception\RuntimeException
     * @return UserService
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        /* @var $entityManager EntityManager */
        $entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');

        /* @var $doctrineAuthenticationProvider DoctrineUserProvider */
        $doctrineUserProvider = new DoctrineUserProvider(
            $entityManager,
            User::CN(),
            UserDetail::CN(),
            UserPhoneNumber::CN()
        );

        $userService = new UserService($doctrineUserProvider, $serviceManager);

        return $userService;
    }
}