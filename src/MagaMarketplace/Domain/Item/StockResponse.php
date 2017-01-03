<?php

namespace MagaMarketplace\Domain\Item;

/**
 * Description of StockResponse
 *
 * @author Maicon Sasse
 */
class StockResponse extends Stock
{

    /**
     * Quantidade reservada
     * @var integer
     */
    protected $reserved;

    /**
     * Quantidade disponível para venda
     * @var integer
     */
    protected $available;

    public function getReserved()
    {
        return $this->reserved;
    }

    public function getAvailable()
    {
        return $this->available;
    }

    public function setReserved($reserved)
    {
        $this->reserved = $this->intValue($reserved);
    }

    public function setAvailable($available)
    {
        $this->available = $this->intValue($available);
    }

}
