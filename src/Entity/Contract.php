<?php
// src/Entity/Contrato.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="app_contract")
 * @ORM\Entity
 */
class Contract
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="contracts")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Column(name="username_id", type="string", length=30)
     */
    public $username;

    /**
     * @ORM\Column(name="currency", type="string", length=30)
     */
    public $currency;


    /**
     * @ORM\Column(name="hashrate", type="float", length=3)
     */
    public $hashrate;

    /**
     * @ORM\Column(name="state", type="integer", length=3)
     */
    private $state;



    public function getUsername(): User
    {
        return $this->username;
    }


    public function setUsername($user)
    {
        return $this->username = $user;
    }


    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        return $this->password = $password;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
    public function setCurrency($currency)
    {
        return $this->currency = $currency;
    }

    public function getHashrate()
    {
        return $this->hashrate;
    }
    public function setHashrate($hashrate)
    {
        return $this->hashrate = $hashrate;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setState($state)
    {
        return $this->state = $state;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
