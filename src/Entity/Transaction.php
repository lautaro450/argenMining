<?php
// src/Entity/Transaction.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="app_transaction")
 * @ORM\Entity
 */
class Transaction
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="type", type="string", length=30)
     */
    public $type;
    /**
     * @ORM\Column(name="comment", type="string", length=100)
     */
    public $comment;

    /**
     * @ORM\Column(name="state", type="integer", length=3)
     */
    private $state;

    /**
     * @ORM\Column(name="fecha_solicitud", type="datetime")
     */
    private $fechaSolicitud;

    /**
     * @ORM\Column(name="fecha_realizado", type="datetime")
     */
    private $fechaRealizado;
    /**
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $userId;



    public function setType($type)
    {
        return $this->type = $type;
    }


    public function getType()
    {
        return $this->type;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
    public function setCurrency($currency)
    {
        return $this->currency = $currency;
    }

    public function getComment()
    {
        return $this->comment;
    }
    public function setComment($comment)
    {
        return $this->comment = $comment;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setState($state)
    {
        return $this->state = $state;
    }

    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }
    public function setFechaSolicitud()
    {
        return $this->fechaSolicitud = new \DateTime("now");
    }

    public function getFechaRealizado()
    {
        return $this->fechaRealizado;
    }
    public function setFechaRealizado($fechaRealizado)
    {
        return $this->fechaRealizado = $fechaRealizado;
    }

    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId)
    {
        return $this->userId = $userId;
    }

}
