<?php

namespace MagaMarketplace\Domain\Batch;

use \MagaMarketplace\Domain;

/**
 * Description of TrackingUpdate
 *
 * @author Maicon Sasse
 */
class TrackingUpdate extends Domain\Order\TrackingResponse
{

    /**
     * Identificador do tracking (interno)
     * @var string
     */
    protected $id;

    /**
     * Identificador do pedido
     * @var string
     */
    protected $orderId;

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $this->stringValue($orderId);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

}
