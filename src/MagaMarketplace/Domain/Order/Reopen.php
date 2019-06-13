<?php

namespace MagaMarketplace\Domain\Order;

/**
 * Description of Reopen
 *
 * @author Maicon Sasse
 */
class Reopen extends Canceled
{

    public function getStatus()
    {
        return Order::STATUS_NEW;
    }

}
