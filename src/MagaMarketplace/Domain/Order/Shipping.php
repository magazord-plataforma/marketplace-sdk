<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Tracking de envio para a transportadora
 *
 * @author Maicon Sasse
 */
class Shipping extends Tracking
{

    /**
     * Transportadora
     * @var Carrier
     */
    protected $carrier;

    /**
     * Código de rastreio na transportadora
     * @var string
     */
    protected $trackingNumber;

    /**
     * Nota Fiscal
     * @var Invoice
     */
    protected $invoice;

    /**
     * Identifica se a saída do estoque dos itens relacionados ao tracking será feita automaticamente
     * @var bool
     */
    protected $changeStock;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'items' => '\\MagaMarketplace\\Domain\\Order\\TrackingItem',
        'carrier' => '\\MagaMarketplace\\Domain\\Order\\Carrier',
        'invoice' => '\\MagaMarketplace\\Domain\\Order\\Invoice'
    );

    public function getStatus()
    {
        return Order::STATUS_SHIPPED;
    }

    public function getCarrier()
    {
        return $this->carrier;
    }

    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function getChangeStock()
    {
        return $this->changeStock;
    }

    public function setCarrier(Carrier $carrier = null)
    {
        $this->carrier = $carrier;
    }

    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $this->stringValue($trackingNumber);
    }

    public function setInvoice(Invoice $invoice = null)
    {
        $this->invoice = $invoice;
    }

    public function setChangeStock($changeStock)
    {
        $this->changeStock = $this->boolValue($changeStock);
    }

}
