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

    /**
     * Anexos
     * @var Attachment[]
     */
    protected $attachments;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = [
        'attachments' => '\\MagaMarketplace\\Domain\\Ticket\\Attachment'
    ];

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

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function setAttachments(Array $attachments = null)
    {
        $this->attachments = $attachments;
    }

    public function newAttachment(Attachment $attachment)
    {
        $attachments = $this->getAttachments() ?: [];
        $attachments[] = $attachment;
        $this->setAttachments($attachment);
    }
}