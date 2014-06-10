<?php

namespace BdUser\Service;

use BdUser\Entity\User;
use BdUser\Entity\UserPhoneNumber;
use BdUser\Entity\UserDetail;
use BdUser\UserDetailInterface;
use BdUser\UserInterface;
use BdUser\UserPhoneNumberInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;
use BdGeneric\GenericDoctrineProvider;
use BdUser\UserProviderInterface;

class UserService implements EventManagerAwareInterface
{
    /**
     * @var UserProviderInterface
     */
    protected $userProvider;

    /**
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * @param UserProviderInterface $userProvider
     * @param ServiceManager $serviceManager
     */
    public function __construct(UserProviderInterface $userProvider, ServiceManager $serviceManager)
    {
        $this->userProvider = $userProvider;
        $this->serviceManager = $serviceManager;
    }

    /**
     * @param ServiceManager $serviceManager
     */
    public function setServiceManager($serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * Inject an EventManager instance
     *
     * @param  EventManagerInterface $eventManager
     * @return UserService
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(
            array(
                __CLASS__,
                get_called_class(),
            )
        );
        $this->eventManager = $eventManager;

        return $this;
    }

    /**
     * @param $id
     * @return \BdUser\UserInterface
     */
    public function findUser($id)
    {
        return $this->userProvider->findUser($id);
    }

    /**
     * @param array $criteria
     * @return array
     */
    public function findUsersBy(array $criteria)
    {
        return $this->userProvider->findUsersBy($criteria);
    }

    /**
     * @param $criteria
     * @return array
     */
    public function findUserDetailBy($criteria)
    {
        return $this->userProvider->findUserDetailBy($criteria);
    }

    /**
     * @param UserInterface $user
     */
    public function storeUser(UserInterface $user) {
        $this->userProvider->storeUser($user);
    }

    /**
     * @param UserPhoneNumberInterface $userPhoneNumber
     */
    public function storeUserPhoneNumber(UserPhoneNumberInterface $userPhoneNumber) {
        $this->userProvider->storeUserPhoneNumber($userPhoneNumber);
    }

    /**
     * @param UserDetailInterface $userDetail
     */
    public function storeUserDetail(UserDetailInterface $userDetail) {
        $this->userProvider->storeUserDetail($userDetail);
    }

    /**
     * @return array
     */
    public function findAllUsers()
    {
        return $this->userProvider->findAllUsers();
    }

    /**
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * @return array
     */
    public function getKnownCountries()
    {
        return User::getKnownCountries();
    }

    /**
     * @return array
     */
    public function getPhoneTypes()
    {
        $knownTypes = UserPhoneNumber::getAllPhoneType();
        $return = array();

        foreach ($knownTypes as $type) {
            $return[$type] = ucfirst(str_replace('_', ' ', $type));
        }

        return $return;
    }

    /**
     * @param UserInterface $user
     */
    public function removeUser(UserInterface $user)
    {
        $this->userProvider->removeUser($user);
    }

    /**
     * @return User
     */
    public function getNewUser()
    {
        return $this->userProvider->getNewUser();
    }

    /**
     * @return UserDetail
     */
    public function getNewUserDetail()
    {
        return $this->userProvider->getNewUserDetail();
    }

    /**
     * @return UserPhoneNumber
     */
    public function getNewUserPhoneNumber()
    {
        return $this->userProvider->getNewUserPhoneNumber();
    }
}