<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Pedidos - GET /orders
 *
 * @author Maicon Sasse
 */
class OrderListFilter extends ListFilter
{

    const SORT_ID = 'id';
    const SORT_DATE_CREATED = 'dateCreated';
    const SORT_LAST_UPDATE = 'lastUpdate';
    const SORT_LATEST_SHIP_DATE = 'latestShipDate';

    /**
     * Identificador
     * @var string
     */
    protected $id;

    /**
     * Número do pedido para o cliente
     * @var string
     */
    protected $siteId;

    /**
     * Número de pedido de terceiro
     * @var string
     */
    protected $thirdPartyId;

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
     * Data/hora última atualização. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $lastUpdate;

    /**
     * Status. (new, approved, shipped, delivered, canceled)
     * @var string
     */
    protected $status;

    /**
     * Identificador Anúncio
     * @var string
     */
    protected $itemId;

    /**
     * Identifica se retorna o detalhamento do "items" no OrderResponse. Padrão: True
     * @var bool
     */
    protected $expandItems;

    /**
     * Identifica se retorna o detalhamento do "tracking" no OrderResponse. Padrão: False
     * @var bool
     */
    protected $expandTracking;

    /**
     * Identifica se deve retornar apenas os pedidos com postagem atrasada. Padrão: False
     * @var bool
     */
    protected $exceededShippingDate;

    /**
     * Data de Limite de Postagem. Formato: YYYY-MM-DD
     * @var string
     */
    protected $latestShipDate;

    public function getId()
    {
        return $this->id;
    }

    public function getSiteId()
    {
        return $this->siteId;
    }

    public function getThirdPartyId()
    {
        return $this->thirdPartyId;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getClientName()
    {
        return $this->clientName;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getItemId()
    {
        return $this->itemId;
    }

    public function getExpandItems()
    {
        return $this->expandItems;
    }

    public function getExpandTracking()
    {
        return $this->expandTracking;
    }

    public function getExceededShippingDate()
    {
        return $this->exceededShippingDate;
    }

    public function getLatestShipDate()
    {
        return $this->latestShipDate;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
    }

    public function setSiteId($siteId)
    {
        $this->siteId = $this->stringValue($siteId);
    }

    public function setThirdPartyId($thirdPartyId)
    {
        $this->thirdPartyId = $this->stringValue($thirdPartyId);
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setItemId($itemId)
    {
        $this->itemId = $this->stringValue($itemId);
    }

    public function setExpandItems($expandItems)
    {
        $this->expandItems = $this->boolValue($expandItems);
    }

    public function setExpandTracking($expandTracking)
    {
        $this->expandTracking = $this->boolValue($expandTracking);
    }

    public function setExceededShippingDate($exceededShippingDate)
    {
        $this->exceededShippingDate = $this->boolValue($exceededShippingDate);
    }

    public function setLatestShipDate($latestShipDate)
    {
        $this->latestShipDate = $this->stringValue($latestShipDate);
    }
}
