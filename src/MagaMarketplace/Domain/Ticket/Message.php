<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Mensagem do protocolo de atendimento
 *
 * @author Maicon Sasse
 */
class Message extends Domain\AbstractModel
{

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * Data/hora. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

    /**
     * Usuário
     * @var string
     */
    protected $userName;

    /**
     * Mensagem
     * @var string
     */
    protected $message;

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

}
