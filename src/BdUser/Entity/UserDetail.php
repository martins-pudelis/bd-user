<?php

namespace BdUser\Entity;

use BdUser\UserDetailInterface;
use Doctrine\ORM\Mapping as ORM;
use BdGeneric\Db\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="bd_user_detail");
 */
class UserDetail extends Entity implements UserDetailInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="userDetail")
     * @var User
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="UserPhoneNumber", mappedBy="userDetail", indexBy="id", cascade={"all"}, orphanRemoval=true)
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @var ArrayCollection
     */
    protected $phoneNumber;

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
