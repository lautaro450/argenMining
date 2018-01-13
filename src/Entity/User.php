<?php
// src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contract", mappedBy="username", cascade={"persist"})
     */
    private $contracts;

    /**
     * @ORM\Column(name="firstName", type="string", length=40)
     */
    public $firstName;

    /**
     * @ORM\Column(name="roles", type="string", length=40)
     */
    public $roles;

    /**
     * @ORM\Column(name="lastName", type="string", length=40)
     */
    public $lastName;

    /**
     * @ORM\Column(name="address", nullable=true, type="string", length=80)
     */
    public $address;
    /**
     * @ORM\Column(name="wallet_eth", nullable=true, type="string", length=124)
     */
    public $walletEth;
    /**
     * @ORM\Column(name="wallet_etc", nullable=true, type="string", length=124)
     */
    public $walletEtc;
    /**
     * @ORM\Column(name="wallet_pasl", nullable=true, type="string", length=124)
     */
    public $walletPasl;
    /**
     * @ORM\Column(name="wallet_zcash", nullable=true, type="string", length=124)
     */
    public $walletZcash;

    /**
     * @ORM\Column(name="username", type="string", length=60, unique=true)
     */
    public $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    public $password;


    /**
     * @ORM\Column(type="string", length=64)
     */
    public $plainPassword;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->contracts = new ArrayCollection();
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function getContracts()
    {
        return $this->contracts;
    }
public function __toString() {
    $this->username = 'test';
    return $this->username;
}
public function addContract(Contract $contract)
    {
        if ($this->contracts->contains($contract)) {
            return;
        }

        $this->contracts[] = $contract;
        // set the *owning* side!
        $contract->setUsername($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        return $this->username = $username;
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

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    public function setPlainPassword($plainPassword)
    {
        return $this->plainPassword = $plainPassword;
    }
    public function setFirstName($firstName)
    {
        return $this->firstName = $firstName;
    }
    public function setLastName($lastName)
    {
        return $this->lastName = $lastName;
    }
    public function setAddress($address)
    {
        return $this->address = $address;
    }
    public function setWalletEth($walletEth)
    {
        return $this->walletEth = $walletEth;
    }
    public function setWalletEtc($walletEtc)
    {
        return $this->walletEtc = $walletEtc;
    }
    public function setWalletPasl($walletPasl)
    {
        return $this->walletPasl = $walletPasl;
    }
    public function setWalletLbry($walletLbry)
    {
        return $this->walletLbry = $walletLbry;
    }
    public function setWalletZcash($walletZcash)
    {
        return $this->walletZcash = $walletZcash;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        return array($roles);
    }

    public function setRoles($roles)
    {
        return $this->roles = $roles;
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
