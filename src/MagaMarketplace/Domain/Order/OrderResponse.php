<?php

namespace MagaMarketplace\Domain\Order;

/**
 * Description of OrderResponse
 *
 * @author Maicon Sasse
 */
class OrderResponse extends Order
{

    /**
     * Tracking do Pedido
     * @var TrackingResponse[]
     */
    protected $tracking;

    public function getTracking()
    {
        return $this->tracking;
    }

    public function setTracking(array $tracking = null)
    {
        $this->tracking = $tracking;
    }

    public function addTracking(TrackingResponse $tracking)
    {
        $trackings = ($this->getTracking()) ? $this->getTracking() : array();
        $trackings[] = $tracking;
        $this->setTracking($trackings);
    }

}
