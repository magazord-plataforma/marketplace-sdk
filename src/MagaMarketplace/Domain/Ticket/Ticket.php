<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Protocolo de atendimento
 *
 * @author Maicon Sasse
 */
class Ticket extends Domain\AbstractModel
{

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * Data/hora de abertura. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

    /**
     * Tipo. (Dúvidas, Vendas, Reclamações, Trocas)
     * @var string
     */
    protected $type;

    /**
     * Assunto
     * @var string
     */
    protected $subject;

    /**
     * Status
     * @var string
     */
    protected $status;

    /**
     * Cliente
     * @var Domain\Order\Client
     */
    protected $client;

    /**
     * Pedido
     * @var Domain\Link
     */
    protected $order;

    /**
     * Loja do marketplace
     * @var string
     */
    protected $store;

    /**
     * Mensagens
     * @var array
     */
    protected $messages;

    /**
     * Data/hora última atualização. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $lastUpdate;

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getStore()
    {
        return $this->store;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setClient(Domain\Order\Client $client)
    {
        $this->client = $client;
    }

    public function setOrder(Domain\Link $order = null)
    {
        $this->order = $order;
    }

    public function setStore($store)
    {
        $this->store = $store;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

}
