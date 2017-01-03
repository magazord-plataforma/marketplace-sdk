<?php

namespace MagaMarketplace\Domain\Filter;

use \MagaMarketplace\Domain;

/**
 * Description of ListFilter
 *
 * @author Maicon Sasse
 */
class ListFilter extends Domain\AbstractModel
{

    /**
     * Quantidade de registros por pagina
     * @var int
     */
    protected $limit;

    /**
     * Posição inicial da consulta
     * @var int
     */
    protected $offset;

    /**
     * Ordenação dos registros
     * @var string
     */
    protected $sort;

    public function getLimit()
    {
        return $this->defaultValue($this->limit, 50);
    }

    public function getOffset()
    {
        return $this->defaultValue($this->offset, 0);
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setLimit($limit)
    {
        $this->limit = $this->intValue($limit);
    }

    public function setOffset($offset)
    {
        $this->offset = $this->intValue($offset);
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
    }

}
