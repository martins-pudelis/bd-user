<?php

namespace BdUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Form;
use Zend\Http\Request as HttpRequest;
use BdAuthentication\Validator\PasswordStrength;
use BdAuthentication\Service\AuthService;
use BdAuthentication\Service\PasswordChangeService;
use BdUser\Entity\User;
/**
 * Class IndexController
 * @package BdUser\Controller
 * @method \BdUser\Service\UserService userService()
 *
 */
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return array(
            'users' => $this->userService()->findAllUsers()
        );
    }

    public function newAction()
    {
        /** @var Form $userForm */
        $userForm = $this->getServiceLocator()->get('bd_user_form');

        /** @var Form $userDetailForm */
        $userDetailForm = $this->getServiceLocator()->get('bd_user_details');

        /** @var Form $userPhoneForm */
        $userPhoneForm = $this->getServiceLocator()->get('bd_user_phone_form');

        /** @var Form $passwordForm */
        $passwordForm = $this->getServiceLocator()->get('bd_user_password_form');

        $passwordStrengthValidator = new PasswordStrength();
        $passwordForm
            ->getInputFilter()
            ->get('password')
            ->getValidatorChain()
            ->addValidator($passwordStrengthValidator);

        $userPhoneForm->get('type')->setValueOptions($this->userService()->getPhoneTypes());
        $userDetailForm->get('country')->setValueOptions($this->userService()->getKnownCountries());

        if ($this->getRequest()->isPost()) {

            $userForm->setData($this->getRequest()->getPost());
            $userDetailForm->setData($this->getRequest()->getPost());

            $userPhoneForm->setData($this->getRequest()->getPost());
            $passwordForm->setData($this->getRequest()->getPost());

            if ($userForm->isValid() && $userDetailForm->isValid() &&
                $userPhoneForm->isValid() && $passwordForm->isValid()) {

                //@todo need to find better solution
                $today = new \DateTime('now');
                $dateTime = $today->format('Y-m-d H:i:s');
                $params = $this->params();
                $user = $this->userService()->getNewUser();
                $user->setCreationDate($dateTime);
                $user->setUsername($params->fromPost('username'));
                $user->setStatus(User::STATUS_ACTIVE);
                $this->userService()->storeUser($user);


                $userDetail = $this->userService()->getNewUserDetail();
                $userDetail->setCreationDate($dateTime);
                $userDetail->setCity($params->fromPost('city'));
                $userDetail->setUser($user);
                $userDetail->setEmail($params->fromPost('email'));
                $userDetail->setFirstName($params->fromPost('first-name'));
                $userDetail->setMiddleName($params->fromPost('middle-name'));
                $userDetail->setLastName($params->fromPost('last-name'));
                $userDetail->setCountry($params->fromPost('country'));
                $userDetail->setStreet($params->fromPost('street'));
                $userDetail->setStreetNumber($params->fromPost('street-number'));
                $userDetail->setZip($params->fromPost('zip'));
                $this->userService()->storeUserDetail($userDetail);

                $userPhoneNumber = $this->userService()->getNewUserPhoneNumber();
                $userPhoneNumber->setPhoneType($params->fromPost('type'));
                $userPhoneNumber->setNumber($params->fromPost('number'));
                $userPhoneNumber->setCreationDate($dateTime);

                $userPhoneNumber->setUserDetail($userDetail);
                $this->userService()->storeUserPhoneNumber($userPhoneNumber);

                /** @var AuthService $authService */
                $authService = $this->getServiceLocator()->get('AuthService');

                /** @var PasswordChangeService $passwordChangeService */
                $passwordChangeService = $this->getServiceLocator()->get('PasswordChangeService');
                $authData = $authService->getNewAuthenticationData();

                $authData->setPassword(
                    $passwordChangeService->createPassword($params->fromPost('password'))
                );

                $authData->setUser($user);
                $authData->setPasswordUntilValidDate($dateTime);
                $authService->storeAuthenticationData($authData);

                $this->flashMessenger()->addSuccessMessage('User created successfully');
                $this->redirectToIndex();

            } else {
                $this->flashMessenger()->addErrorMessage('Invalid data. Please carefully check data and submit again!');
            }
        }

//        $userPhoneForms = array();
//        array_push($userPhoneForms, $userPhoneForm);

        return array(
            'userForm' => $userForm,
            'userDetailForm' => $userDetailForm,
            'userPhoneForm' => $userPhoneForm,
            'passwordForm' => $passwordForm,
        );
    }

    public function confirmAction()
    {
        $userId = $this->getEvent()->getRouteMatch()->getParam('id', null);
        $user = $this->userService()->findUser($userId);

        if ($this->getRequest()->isPost() && $userId) {
            $this->flashMessenger()->addSuccessMessage('User has been successfully removed');
            //$this->userService()->removeUser($user);

            $this->redirectToIndex();
        }

        return array(
            'user' => $user,
        );
    }

    public function editAction()
    {
        $userId = $this->getEvent()->getRouteMatch()->getParam('id', null);
    }

    public function redirectToIndex()
    {
        $this->redirect()->toRoute('bd_user_index');
    }
}
