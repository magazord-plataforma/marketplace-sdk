<?php

namespace MagaMarketplace\Domain\Order;

/**
 * Tracking de aprovação
 *
 * @author Maicon Sasse
 */
class Approved extends Tracking
{

    /**
     * Data Limite de Postagem
     * @var string
     */
    protected $latestShipDate;

    public function getLatestShipDate()
    {
        return $this->latestShipDate;
    }

    public function setLatestShipDate($latestShipDate)
    {
        $this->latestShipDate = $latestShipDate;
    }

    public function getStatus()
    {
        return Order::STATUS_APPROVED;
    }

}
