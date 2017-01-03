<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Pedidos - GET /items/{id}
 *
 * @author Maicon Sasse
 */
class OrderListFilter extends ListFilter
{

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
     * Data/hora de criação. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

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

    public function getId()
    {
        return $this->id;
    }

    public function getSiteId()
    {
        return $this->siteId;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getItemId()
    {
        return $this->itemId;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
    }

    public function setSiteId($siteId)
    {
        $this->siteId = $this->stringValue($siteId);
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setItemId($itemId)
    {
        $this->itemId = $this->stringValue($itemId);
    }

}
