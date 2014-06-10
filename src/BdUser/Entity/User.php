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

    public static $knownCountries = array(
        'lt' => 'Lithuania',
        'ee' => 'Estonia',
        'lv' => 'Latvia',
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

    /**
     * @param array $allStatuses
     */
    public function setAllStatuses($allStatuses)
    {
        $this->allStatuses = $allStatuses;
    }

    /**
     * @return array
     */
    public function getAllStatuses()
    {
        return $this->allStatuses;
    }

    /**
     * @param \BdAuthentication\Entity\AuthenticationData $authenticationData
     */
    public function setAuthenticationData($authenticationData)
    {
        $this->authenticationData = $authenticationData;
    }

    /**
     * @return \BdAuthentication\Entity\AuthenticationData
     */
    public function getAuthenticationData()
    {
        return $this->authenticationData;
    }

    /**
     * @param mixed $authenticationHistory
     */
    public function setAuthenticationHistory($authenticationHistory)
    {
        $this->authenticationHistory = $authenticationHistory;
    }

    /**
     * @return mixed
     */
    public function getAuthenticationHistory()
    {
        return $this->authenticationHistory;
    }

    /**
     * @param string $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $passwordRecoveryRequest
     */
    public function setPasswordRecoveryRequest($passwordRecoveryRequest)
    {
        $this->passwordRecoveryRequest = $passwordRecoveryRequest;
    }

    /**
     * @return mixed
     */
    public function getPasswordRecoveryRequest()
    {
        return $this->passwordRecoveryRequest;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \BdUser\Entity\UserDetail $userDetail
     */
    public function setUserDetail($userDetail)
    {
        $this->userDetail = $userDetail;
    }

    /**
     * @return \BdUser\Entity\UserDetail
     */
    public function getUserDetail()
    {
        return $this->userDetail;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return array
     */
    public static function getKnownCountries()
    {
        return self::$knownCountries;
    }
}
