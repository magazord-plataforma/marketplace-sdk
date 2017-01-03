<?php

namespace MagaMarketplace\Domain\Batch;

use \MagaMarketplace\Domain;

/**
 * Description of ItemUpdate
 *
 * @author Maicon Sasse
 */
class ItemUpdate extends Domain\AbstractModel
{

    /**
     * @var string
     */
    protected $idMarketplace;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var Domain\Item\StockResponse
     */
    protected $stock;

    /**
     * @var Domain\Item\Price
     */
    protected $price;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'stock' => '\\MagaMarketplace\\Domain\\Item\\StockResponse',
        'price' => '\\MagaMarketplace\\Domain\\Item\\Price'
    );

    public function getIdMarketplace()
    {
        return $this->idMarketplace;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setIdMarketplace($idMarketplace)
    {
        $this->idMarketplace = $idMarketplace;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStock(Domain\Item\StockResponse $stock = null)
    {
        $this->stock = $stock;
    }

    public function setPrice(Domain\Item\Price $price = null)
    {
        $this->price = $price;
    }

    public function setActive($active)
    {
        $this->active = $this->boolValue($active);
    }

}
