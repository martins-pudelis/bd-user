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
     * @ORM\Column(type="string", length=40, nullable=true)
     * @var string
     */
    protected $changeDate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @var string
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @var string
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @var string
     */
    protected $street;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @var string
     */
    protected $streetNumber;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @var string
     */
    protected $zip;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    protected $creationDate;

    /**
     * @param string $changeDate
     */
    public function setChangeDate($changeDate)
    {
        $this->changeDate = $changeDate;
    }

    /**
     * @return string
     */
    public function getChangeDate()
    {
        return $this->changeDate;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
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
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param \BdUser\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \BdUser\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        $names = array();
        array_push($names, $this->getFirstName());

        if($this->getMiddleName()) {
            array_push($names, $this->getMiddleName());
        }

        array_push($names, $this->getLastName());

        return implode(' ', $names);
    }
}
