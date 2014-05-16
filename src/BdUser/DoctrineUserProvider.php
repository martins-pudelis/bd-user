<?php

namespace BdUser;

use Doctrine\ORM\EntityManager;
use BdGeneric\GenericDoctrineProvider;

/**
 *
 */
class DoctrineUserProvider implements UserProviderInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \BdGeneric\GenericDoctrineProvider
     */
    protected $userProvider;

    /**
     * @var \BdGeneric\GenericDoctrineProvider
     */
    protected $userDetailProvider;

    /**
     * @var \BdGeneric\GenericDoctrineProvider
     */
    protected $userPhoneNumberProvider;

    /**
     * @param EntityManager $entityManager
     * @param $userEntityClass
     * @param $userDataClass
     * @param $userPhoneNumberClass
     */
    public function __construct(
        EntityManager $entityManager,
        $userEntityClass,
        $userDataClass,
        $userPhoneNumberClass
    ) {
        $this->entityManager = $entityManager;
        $this->userProvider = new GenericDoctrineProvider($entityManager, $userEntityClass);
        $this->userDetailProvider = new GenericDoctrineProvider($entityManager, $userDataClass);
        $this->userPhoneNumberProvider = new GenericDoctrineProvider($entityManager, $userPhoneNumberClass);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param UserInterface $userData
     * @return void
     */
    public function storeUser(UserInterface $userData)
    {
        $this->userProvider->store($userData);
    }

    /**
     * @param UserPhoneNumberInterface $userPhoneNumber
     * @return void
     */
    public function storeUserPhoneNumber(UserPhoneNumberInterface $userPhoneNumber)
    {
        $this->userDetailProvider->store($userPhoneNumber);
    }

    /**
     * @param UserDetailInterface $userDetail
     * @return void
     */
    public function storeUserDetail(UserDetailInterface $userDetail)
    {
        $this->userDetailProvider->store($userDetail);
    }

    /**
     * @param UserInterface $user
     * @return mixed
     */
    public function removeUser(UserInterface $user)
    {
        $this->userProvider->remove($user);
    }

    /**
     * @param UserDetailInterface $userDetail
     * @return mixed
     */
    public function removeUserDetail(UserDetailInterface $userDetail)
    {
        $this->userDetailProvider->remove($userDetail);
    }

    /**
     * @param UserPhoneNumberInterface $userPhoneNumber
     * @return mixed
     */
    public function removeUserPhoneNumber(UserPhoneNumberInterface $userPhoneNumber)
    {
        $this->userPhoneNumberProvider->remove($userPhoneNumber);
    }

    /**
     * @return UserInterface
     */
    public function getNewUser()
    {
        $this->userProvider->getNew();
    }

    /**
     * @return UserDetailInterface
     */
    public function getNewUserDetail()
    {
        $this->userDetailProvider->getNew();
    }

    /**
     * @return UserPhoneNumberInterface
     */
    public function getNewUserPhoneNumber()
    {
        $this->userPhoneNumberProvider->getNew();
    }

    /**
     * @return array
     */
    public function findAllUsers()
    {
        $this->userProvider->findAll();
    }

    /**
     * @return array
     */
    public function findAllUserDetail()
    {
        $this->userDetailProvider->findAll();
    }

    /**
     * @return array
     */
    public function findAllUserPhoneNumber()
    {
        $this->userPhoneNumberProvider->findAll();
    }

    /**
     * @param array $criteria
     * @return array
     */
    public function findUsersBy(array $criteria)
    {
        $this->userProvider->findBy($criteria);
    }

    /**
     * @param array $criteria
     * @return array
     */
    public function findUserDetailBy(array $criteria)
    {
        $this->userDetailProvider->findBy($criteria);
    }

    /**
     * @param array $criteria
     * @return array
     */
    public function findUserPhonesBy(array $criteria)
    {
        $this->userPhoneNumberProvider->findBy($criteria);
    }

    /**
     * @param $id
     * @return UserInterface
     */
    public function findUser($id)
    {
        $this->userProvider->find($id);
    }

    /**
     * @param $id
     * @return UserDetailInterface
     */
    public function findUserDetail($id)
    {
        $this->userDetailProvider->find($id);
    }

    /**
     * @param $id
     * @return UserPhoneNumberInterface
     */
    public function findUserPhoneNumber($id)
    {
        $this->userPhoneNumberProvider->find($id);
    }
}
