<?php

namespace MagaMarketplace\Domain\Order;

/**
 * Tracking de aprovação
 *
 * @author Maicon Sasse
 */
class Approved extends Tracking
{

    public function getStatus()
    {
        return Order::STATUS_APPROVED;
    }

}
