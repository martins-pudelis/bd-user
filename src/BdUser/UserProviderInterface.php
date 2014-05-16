<?php

namespace BdUser;

/**
 * Class UserProviderInterface
 */
interface UserProviderInterface
{

    /**
     * @param UserInterface $user
     * @return void
     */
    public function storeUser(UserInterface $user);

    /**
     * @param UserPhoneNumberInterface $userPhoneNumber
     * @return void
     */
    public function storeUserPhoneNumber(UserPhoneNumberInterface $userPhoneNumber);

    /**
     * @param UserDetailInterface $userDetail
     * @return void
     */
    public function storeUserDetail(UserDetailInterface $userDetail);

    /**
     * @param UserInterface $user
     * @return mixed
     */
    public function removeUser(UserInterface $user);

    /**
     * @param UserDetailInterface $userDetail
     * @return mixed
     */
    public function removeUserDetail(UserDetailInterface $userDetail);

    /**
     * @param UserPhoneNumberInterface $userPhoneNumber
     * @return mixed
     */
    public function removeUserPhoneNumber(UserPhoneNumberInterface $userPhoneNumber);

    /**
     * @return UserInterface
     */
    public function getNewUser();

    /**
     * @return UserDetailInterface
     */
    public function getNewUserDetail();

    /**
     * @return UserPhoneNumberInterface
     */
    public function getNewUserPhoneNumber();

    /**
     * @return array
     */
    public function findAllUsers();

    /**
     * @return array
     */
    public function findAllUserDetail();

    /**
     * @return array
     */
    public function findAllUserPhoneNumber();

    /**
     * @param array $criteria
     * @return array
     */
    public function findUsersBy(array $criteria);

    /**
     * @param array $criteria
     * @return array
     */
    public function findUserDetailBy(array $criteria);

    /**
     * @param array $criteria
     * @return array
     */
    public function findUserPhonesBy(array $criteria);

    /**
     * @param $id
     * @return UserInterface
     */
    public function findUser($id);

    /**
     * @param $id
     * @return UserDetailInterface
     */
    public function findUserDetail($id);

    /**
     * @param $id
     * @return UserPhoneNumberInterface
     */
    public function findUserPhoneNumber($id);
}