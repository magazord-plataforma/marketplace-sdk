<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Pedidos - GET /tickets
 *
 * @author Maicon Sasse
 */
class TicketListFilter extends ListFilter
{

    const SORT_ID = 'id';
    const SORT_DATE_CREATED = 'dateCreated';
    const SORT_LAST_UPDATE = 'lastUpdate';

    /**
     * Identificador
     * @var string
     */
    protected $id;

    /**
     * Data/hora de criação. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

    /**
     * Nome do cliente
     * @var string
     */
    protected $clientName;

    /**
     * Pedido
     * @var string
     */
    protected $orderId;

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
     * Data/hora última atualização. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $lastUpdate;

    /**
     * Identifica se retorna o detalhamento do "messages" no Ticket. Padrão: False
     * @var bool
     */
    protected $expandMessages;

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getClientName()
    {
        return $this->clientName;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function getExpandMessages()
    {
        return $this->expandMessages;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function setExpandMessages($expandMessages)
    {
        $this->expandMessages = $this->boolValue($expandMessages);
    }

}
