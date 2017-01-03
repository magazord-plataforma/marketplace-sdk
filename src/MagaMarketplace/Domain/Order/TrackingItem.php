<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Item do tracking
 *
 * @author Maicon Sasse
 */
class TrackingItem extends Domain\AbstractModel
{

    /**
     * Identificador do anúncio
     * @var string
     */
    protected $itemId;

    /**
     * Quantidade
     * @var integer
     */
    protected $quantity;

    public function getItemId()
    {
        return $this->itemId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setItemId($itemId)
    {
        $this->itemId = $this->stringValue($itemId);
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $this->intValue($quantity);
    }

}
