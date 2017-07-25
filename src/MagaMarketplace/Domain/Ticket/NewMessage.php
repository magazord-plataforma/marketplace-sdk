<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Nova Mensagem do protocolo de atendimento
 *
 * @author Maicon Sasse
 */
class NewMessage extends Domain\AbstractModel
{

    /**
     * Mensagem
     * @var string
     */
    protected $message;

    /**
     * Mensagem enviada/disponível para o cliente?
     * @var bool
     */
    protected $sendClient;

    /**
     * Usuário
     * @var string
     */
    protected $userName;

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $this->stringValue($userName);
    }

    public function getSendClient()
    {
        return $this->sendClient;
    }

    public function setSendClient($sendClient)
    {
        $this->sendClient = $this->boolValue($sendClient);
    }

}
