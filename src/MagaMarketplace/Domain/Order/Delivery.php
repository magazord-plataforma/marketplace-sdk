<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Tracking de entrega para o cliente
 *
 * @author Maicon Sasse
 */
class Delivery extends Tracking
{

    public function getStatus()
    {
        return Order::STATUS_DELIVERED;
    }

}
