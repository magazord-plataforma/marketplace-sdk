<?php

namespace MagaMarketplace\Domain\Order;

/**
 * Description of TrackingResponse
 *
 * @author Maicon Sasse
 */
class TrackingResponse extends Tracking
{

    /**
     * Status. (new, approved, shipped, delivered, canceled)
     * @var string
     */
    protected $status;

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
     * Motivo de Cancelamento
     * @var string
     */
    protected $reason;

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
        return $this->status;
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

    public function getReason()
    {
        return $this->reason;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCarrier(Carrier $carrier = null)
    {
        $this->carrier = $carrier;
    }

    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
    }

    public function setInvoice(Invoice $invoice = null)
    {
        $this->invoice = $invoice;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
    }

}
