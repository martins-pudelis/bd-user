<?php

return array(
    'bd_user_form' => array(
        'type' => 'Zend\Form\Form',
        'hydrator' => new \Zend\Stdlib\Hydrator\ClassMethods(false),
        'elements' => array(
            array(
                'spec' => array(
                    'name' => 'username',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'username',
                        'required' => 'required',
                        'placeholder' => 'Username'
                    ),
                    'options' => array(
                        'label' => 'Username:',
                    ),
                )
            ),
        ),
        'input_filter' => array(
            'username' => array(
                'required' => true,
            ),
        ),
    ),

    'bd_user_phone_form' => array(
        'type' => 'Zend\Form\Form',
        'hydrator' => new \Zend\Stdlib\Hydrator\ClassMethods(false),
        'elements' => array(
            array(
                'spec' => array(
                    'name' => 'type',
                    'type' => 'Zend\Form\Element\Select',
                    'attributes' => array(
                        'id' => 'type',
                    ),
                    'options' => array(
                        'label' => 'Phone type:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'number',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'required' => 'required',
                        'placeholder' => 'Phone number',
                        'id' => 'number',
                    ),
                    'options' => array(
                        'label' => 'Phone number:',
                    ),
                )
            ),
        ),
        'input_filter' => array(
            'username' => array(
                'required' => true,
            ),
        ),
    ),

    'bd_user_password_form' => array(
        'type' => 'Zend\Form\Form',
        'hydrator' => new \Zend\Stdlib\Hydrator\ClassMethods(false),
        'elements' => array(
            array(
                'spec' => array(
                    'name' => 'password',
                    'type' => 'Zend\Form\Element\Password',
                    'attributes' => array(
                        'required' => 'required',
                        'placeholder' => 'Password',
                        'id' => 'password'
                    ),
                    'options' => array(
                        'label' => 'Password:',
                    ),
                )
            ),
            array(
                'spec' => array(
                    'name' => 'passwordAgain',
                    'type' => 'Zend\Form\Element\Password',
                    'attributes' => array(
                        'required' => 'required',
                        'placeholder' => 'Password again',
                        'id' => 'passwordAgain'
                    ),
                    'options' => array(
                        'label' => 'Password again:',
                    ),
                )
            ),
        ),
        'input_filter' => array(
            'password' => array(
                'required' => true,
            ),
            'passwordAgain' => array(
                'required' => true,
            ),
        ),
    ),

    'bd_user_details' => array(
        'type' => 'Zend\Form\Form',
        'hydrator' => new \Zend\Stdlib\Hydrator\ClassMethods(false),
        'elements' => array(
            array(
                'spec' => array(
                    'name' => 'first-name',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'required' => 'required',
                        'placeholder' => 'First name',
                        'id' => 'first-name',
                    ),
                    'options' => array(
                        'label' => 'First name:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'middle-name',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'placeholder' => 'Middle name',
                        'id' => 'middle-name',
                    ),
                    'options' => array(
                        'label' => 'Middle name:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'last-name',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'required' => 'required',
                        'placeholder' => 'Last name',
                        'id' => 'last-name',
                    ),
                    'options' => array(
                        'label' => 'Last name:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'email',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'required' => 'required',
                        'placeholder' => 'E-mail',
                        'id' => 'email',
                    ),
                    'options' => array(
                        'label' => 'E-mail:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'country',
                    'type' => 'Zend\Form\Element\Select',
                    'attributes' => array(
                        'placeholder' => 'Country',
                        'id' => 'country',
                    ),
                    'options' => array(
                        'label' => 'Country:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'city',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'placeholder' => 'City',
                        'id' => 'city',
                    ),
                    'options' => array(
                        'label' => 'City:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'street',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'placeholder' => 'Street',
                        'id' => 'street',
                    ),
                    'options' => array(
                        'label' => 'Street:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'street-number',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'placeholder' => 'Street number',
                        'id' => 'street-number',
                    ),
                    'options' => array(
                        'label' => 'Street number:',
                    ),
                )
            ),

            array(
                'spec' => array(
                    'name' => 'zip',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'placeholder' => 'Zip',
                        'id' => 'zip',
                    ),
                    'options' => array(
                        'label' => 'Zip:',
                    ),
                )
            ),
        ),
        'input_filter' => array(
            'first-name' => array(
                'required' => true,
            ),

            'last-name' => array(
                'required' => true,
            ),

            'email' => array(
                'required' => true,
                'validators' => array(
                    array('name' => 'EmailAddress'),
                ),
            ),
        ),
    ),
);