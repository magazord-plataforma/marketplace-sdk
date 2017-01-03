<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 * Item para o cálculo de frete
 *
 * @author Maicon Sasse
 */
class FreightPreviewItem extends Domain\AbstractModel
{

    /**
     * Link do anúncio
     * @var Domain\Link
     */
    protected $item;

    /**
     * Quantidade
     * @var integer
     */
    protected $quantity;

    public function getItem()
    {
        return $this->item;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setItem(Domain\Link $item = null)
    {
        $this->item = $item;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

}
