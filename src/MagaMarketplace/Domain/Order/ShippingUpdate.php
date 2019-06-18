<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Description of ShippingUpdate
 *
 * @author Maicon Sasse
 */
class ShippingUpdate extends Domain\AbstractModel
{

    /**
     * Data/hora. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $eventDate;

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
     * Url da transportadora para o rastreamento do pedido
     * @var string
     */
    protected $trackingUrl;

    /**
     * Nota Fiscal
     * @var Invoice
     */
    protected $invoice;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'carrier' => '\\MagaMarketplace\\Domain\\Order\\Carrier',
        'invoice' => '\\MagaMarketplace\\Domain\\Order\\Invoice'
    );

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function getCarrier()
    {
        return $this->carrier;
    }

    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    public function getTrackingUrl()
    {
        return $this->trackingUrl;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

    public function setCarrier(Carrier $carrier = null)
    {
        $this->carrier = $carrier;
    }

    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $this->stringValue($trackingNumber);
    }

    public function setTrackingUrl($trackingUrl)
    {
        $this->trackingUrl = $this->stringValue($trackingUrl);
    }

    public function setInvoice(Invoice $invoice = null)
    {
        $this->invoice = $invoice;
    }

}
