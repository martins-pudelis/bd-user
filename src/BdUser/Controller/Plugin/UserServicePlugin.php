<?php

namespace BdUser\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use BdUser\Service\UserService;

class UserServicePlugin extends AbstractPlugin
{

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (empty($this->userService)) {
            $this->userService = $this->getController()->getServiceLocator()->get('UserService');
        }

        return call_user_func_array(array($this->userService, $name), $arguments);
    }
}
