<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 * Cálculo de frete
 *
 * @author Maicon Sasse
 */
class FreightPreview extends Domain\AbstractModel
{

    /**
     * CEP
     * @var integer
     */
    protected $zipCode;

    /**
     * Código do Lojista
     * @var int
     */
    protected $sellerId;

    /**
     * Lista dos itens
     * @var FreightPreviewItem[]
     */
    protected $items;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'items' => '\\MagaMarketplace\\Domain\\Freight\\FreightPreviewItem'
    );

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @return FreightPreviewItem[]
     */
    public function getItems()
    {
        return $this->defaultValue($this->items, array());
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $this->intValue($zipCode);
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

    public function addItem($itemId, $quantity)
    {
        $items = ($this->getItems()) ? $this->getItems() : array();
        $item = new FreightPreviewItem();
        $item->setItem(Domain\Link::itemsLink($itemId));
        $item->setQuantity($quantity);
        $items[] = $item;
        $this->setItems($items);
        return $item;
    }

}
