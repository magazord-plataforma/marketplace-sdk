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

}
