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

    /**
     * Anúncio (PROPRIEDADE INTERNA)
     * @var Domain\Item\ItemResponse
     */
    protected $_itemResponse;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'item' => '\\MagaMarketplace\\Domain\\Link'
    );

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
        $this->quantity = $this->intValue($quantity);
    }

    public function getItemResponse()
    {
        return $this->_itemResponse;
    }

    public function setItemResponse(Domain\Item\ItemResponse $itemResponse = null)
    {
        $this->_itemResponse = $itemResponse;
    }

}
