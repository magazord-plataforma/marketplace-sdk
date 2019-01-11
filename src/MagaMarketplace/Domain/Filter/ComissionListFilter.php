<?php

namespace MagaMarketplace\Domain\Filter;

/**
 * Filtro da Consulta de Comissões - GET /reports/comissions
 * @author Lucas Felicio Adriano
 */
class ComissionListFilter extends ListFilter
{

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * ID do Anúncio
     * @var string
     */
    protected $itemId;

    /**
     * Título do Anúncio
     * @var string
     */
    protected $item;

    /**
     * Tipo da Comissão
     * @var string
     */
    protected $type;

    public function getId()
    {
        return $this->id;
    }

    public function getItemId()
    {
        return $this->itemId;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function setItemId($itemId)
    {
        $this->itemId = $this->stringValue($itemId);
    }

    public function setItem($item)
    {
        $this->item = $this->stringValue($item);
    }

    public function setType($type)
    {
        $this->type = $this->stringValue($type);
    }
}