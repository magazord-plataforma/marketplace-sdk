<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Description of Tracking
 *
 * @author Maicon Sasse
 */
abstract class Tracking extends Domain\AbstractModel
{

    /**
     * Lista dos itens
     * @var TrackingItem[]
     */
    protected $items;

    /**
     * Data/hora. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $eventDate;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'items' => '\\MagaMarketplace\\Domain\\Order\\TrackingItem'
    );

    public function getItems()
    {
        return $this->items;
    }

    abstract public function getStatus();

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

    public function addItem($itemId, $quantity)
    {
        $items = ($this->getItems()) ? $this->getItems() : array();
        $trackItem = new TrackingItem();
        $trackItem->setItemId($itemId);
        $trackItem->setQuantity($quantity);
        $items[] = $trackItem;
        $this->setItems($items);
    }

    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    }

}
