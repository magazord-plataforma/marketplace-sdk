<?php

namespace MagaMarketplace\Domain\Order;

/**
 * Tracking de devolução, mesma estrutura do cancelamento
 *
 * @author Maicon Sasse
 */
class Returned extends Canceled
{

    public function getStatus()
    {
        return Order::STATUS_RETURNED;
    }

}
