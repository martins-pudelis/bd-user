<?php

return array(
    'service_manager' => array(
        'aliases' => array(
            'UserService' => 'BdUser\Service\UserService',
        ),
        'factories' => array(
            'BdUser\Service\UserService' => 'BdUser\Service\BdServiceFactory',
        )
    ),
);