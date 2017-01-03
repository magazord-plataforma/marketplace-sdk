<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 *
 *
 * @author Maicon Sasse
 */
class FreightPreviewItemResponse extends Domain\AbstractModel
{

    /**
     * Identificador do anúncio
     * @var integer
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
        $this->itemId = $itemId;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

}
