<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Estoque
 *
 * @author Maicon Sasse
 */
class Stock extends Domain\AbstractModel
{

    /**
     * Quantidade em estoque
     * @var integer
     */
    protected $quantity;

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $this->intValue($quantity);
    }

}
