<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Itens - GET /items
 *
 * @author Maicon Sasse
 */
class ItemListFilter extends ListFilter
{

    const SORT_ID = 'id';
    const SORT_TITLE = 'title';
    const SORT_DATE = 'dateCreated';
    const SORT_STOCK_QUANTITY = 'stock.quantity';
    const SORT_STOCK_AVAILABLE = 'stock.available';

    /**
     * Identificador
     * @var string
     */
    protected $id;

    /**
     * Identificador Agrupador (para produtos com variação)
     * @var string
     */
    protected $productId;

    /**
     * Marca
     * @var string
     */
    protected $brand;

    /**
     * Título
     * @var string
     */
    protected $title;

    /**
     * Status. (pending, approved, rejected, selling)
     * @var string
     */
    protected $status;

    /**
     * Possui estoque?
     * @var boolean
     */
    protected $hasStock;

    /**
     * Data/hora de criação inicial
     * @var string
     */
    protected $dateCreated;

    public function getId()
    {
        return $this->id;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getHasStock()
    {
        return $this->hasStock;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setHasStock($hasStock)
    {
        $this->hasStock = $this->boolValue($hasStock);
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

}
