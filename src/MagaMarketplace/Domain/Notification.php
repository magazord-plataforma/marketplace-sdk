<?php

namespace MagaMarketplace\Domain;

/**
 * Notificação
 *
 * @author Maicon Sasse
 */
class Notification extends AbstractModel
{

    /**
     * Data/hora. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $eventDate;

    /**
     * Recurso
     * @var Link
     */
    protected $resource;

    /**
     * Status do recurso
     * @var string
     */
    protected $resourceStatus;

    /**
     * Código do Lojista
     * @var int
     */
    protected $sellerId;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'resource' => '\\MagaMarketplace\\Domain\\Link'
    );

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function getResourceRel()
    {
        return ($this->getResource()) ? $this->getResource()->getRel() : null;
    }

    public function getResourceId()
    {
        return ($this->getResource()) ? $this->getResource()->getId() : null;
    }

    public function getResourceStatus()
    {
        return $this->resourceStatus;
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    public function setResource(Link $resource = null)
    {
        $this->resource = $resource;
    }

    public function setResourceStatus($resourceStatus)
    {
        $this->resourceStatus = $resourceStatus;
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

}
