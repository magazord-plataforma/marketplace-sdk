<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Description of StockAvailable
 *
 * @author Maicon Sasse
 */
class StockAvailable extends Domain\AbstractModel
{

    /**
     * Quantidade disponível para venda
     * @var integer
     */
    protected $available;

    /**
     * Prazo de expedição (dias)
     * @var integer
     */
    protected $shippingTime;

    public function getAvailable()
    {
        return $this->available;
    }

    public function setAvailable($available)
    {
        $this->available = $this->intValue($available);
    }

    public function getShippingTime()
    {
        return $this->shippingTime;
    }

    public function setShippingTime($shippingTime)
    {
        $this->shippingTime = $this->intValue($shippingTime);
    }

}
