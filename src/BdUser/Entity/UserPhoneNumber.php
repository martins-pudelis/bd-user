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

    public static $allPhoneType = array(
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
     * @var UserDetail
     */
    protected $userDetail;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $phoneType;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $number;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $creationDate;

    /**
     * @param array $allPhoneType
     */
    public function setAllPhoneType($allPhoneType)
    {
        $this->allPhoneType = $allPhoneType;
    }

    /**
     * @return array
     */
    public static function getAllPhoneType()
    {
        return self::$allPhoneType;
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
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $phoneType
     */
    public function setPhoneType($phoneType)
    {
        $this->phoneType = $phoneType;
    }

    /**
     * @return string
     */
    public function getPhoneType()
    {
        return $this->phoneType;
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
}
