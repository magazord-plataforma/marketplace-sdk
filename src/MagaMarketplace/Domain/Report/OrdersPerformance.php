<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Description of OrdersPerformance
 *
 * @author Maicon Sasse
 */
class OrdersPerformance extends Domain\AbstractModel
{

    /**
     * Lojista
     * @var Domain\Seller
     */
    protected $seller;

    /**
     * Performance cancelamento
     * @var OrdersPerformanceItem
     */
    protected $cancel;

    /**
     * Performance envio
     * @var OrdersPerformanceItem
     */
    protected $shipping;

    /**
     * Performance entrega
     * @var OrdersPerformanceItem
     */
    protected $delivery;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'seller' => '\\MagaMarketplace\\Domain\\Seller',
        'cancel' => '\\MagaMarketplace\\Domain\\Report\\OrdersPerformanceItem',
        'shipping' => '\\MagaMarketplace\\Domain\\Report\\OrdersPerformanceItem'
    );

    public function getSeller()
    {
        return $this->seller;
    }

    public function setSeller(Domain\Seller $seller = null)
    {
        $this->seller = $seller;
    }

    public function getCancel()
    {
        return $this->cancel;
    }

    public function setCancel(OrdersPerformanceItem $cancel = null)
    {
        $this->cancel = $cancel;
    }

    public function getShipping()
    {
        return $this->shipping;
    }

    public function setShipping(OrdersPerformanceItem $shipping = null)
    {
        $this->shipping = $shipping;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function setDelivery(OrdersPerformanceItem $delivery = null)
    {
        $this->delivery = $delivery;
    }

}
