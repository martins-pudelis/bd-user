<?php

namespace BdUser\Entity;

use BdUser\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use BdAuthentication\Entity\AuthenticationData;
use BdAuthentication\Entity\AuthenticationHistory;
use Doctrine\Common\Collections\ArrayCollection;
use BdGeneric\Db\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="bd_user");
 */
class User extends Entity implements UserInterface
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';
    const STATUS_LOCKED = 'locked';
    const STATUS_INACTIVE = 'inactive';

    protected $allStatuses = array(
        self::STATUS_ACTIVE,
        self::STATUS_DISABLED,
        self::STATUS_INACTIVE,
        self::STATUS_LOCKED,
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
     * @ORM\OneToOne(targetEntity="UserDetail", inversedBy="user", cascade={"all"})
     * @var UserDetail
     */
    protected $userDetail;

    /**
     * @ORM\OneToOne(targetEntity="BdAuthentication\Entity\AuthenticationData", inversedBy="user", cascade={"all"})
     * @var AuthenticationData
     */
    protected $authenticationData;

    /**
     * @ORM\OneToMany(targetEntity="BdAuthentication\Entity\AuthenticationHistory", mappedBy="user", indexBy="id", cascade={"all"}, orphanRemoval=true)
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @var ArrayCollection
     */
    protected $authenticationHistory;

    /**
     * @ORM\OneToMany(targetEntity="BdAuthentication\Entity\PasswordRecoveryRequest", mappedBy="user", indexBy="id", cascade={"all"}, orphanRemoval=true)
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @var ArrayCollection
     */
    protected $passwordRecoveryRequest;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $creationDate;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $status;
}
