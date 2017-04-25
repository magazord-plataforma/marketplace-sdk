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
     * Identificador
     * @var string
     */
    protected $id;

    /**
     * Tracking do Pedido
     * @var TrackingResponse[]
     */
    protected $tracking;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'client' => '\\MagaMarketplace\\Domain\\Order\\Client',
        'items' => '\\MagaMarketplace\\Domain\\Order\\OrderItem',
        'shippingAddress' => '\\MagaMarketplace\\Domain\\Order\\ShippingAddress',
        'tracking' => '\\MagaMarketplace\\Domain\\Order\\TrackingResponse'
    );

    public function getId()
    {
        return $this->id;
    }

    public function getTracking()
    {
        return $this->tracking;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
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
