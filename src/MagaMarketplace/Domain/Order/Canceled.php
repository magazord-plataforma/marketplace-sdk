<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Tracking de cancelamento
 *
 * @author Maicon Sasse
 */
class Canceled extends Tracking
{

    /**
     * Motivo
     * @var string
     */
    protected $reason;

    public function getStatus()
    {
        return Order::STATUS_CANCELED;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setReason($reason)
    {
        $this->reason = $this->stringValue($reason);
    }

}
