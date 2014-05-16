<?php

namespace BdUser\Entity;

use BdUser\UserPhoneNumberInterface;
use Doctrine\ORM\Mapping as ORM;
use BdGeneric\Db\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="bd_user_phone_number");
 */
class UserPhoneNumber extends Entity implements UserPhoneNumberInterface
{
    const TYPE_MOBILE = 'mobile';
    const TYPE_HOME = 'home';
    const TYPE_WORK = 'work';
    const TYPE_CAR = 'car';

    protected $allPhoneType = array(
        self::TYPE_MOBILE,
        self::TYPE_WORK,
        self::TYPE_CAR,
        self::TYPE_HOME,
    );

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserDetail", inversedBy="phoneNumber")
     * @var User
     */
    protected $userDetail;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $middleName;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $changeDate;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $street;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $streetNumber;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $zip;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $creationDate;
}
