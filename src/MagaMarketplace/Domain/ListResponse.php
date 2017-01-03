<?php

namespace MagaMarketplace\Domain;

/**
 * Listagem de recursos
 *
 * @author Maicon Sasse
 */
class ListResponse extends AbstractModel
{

    /**
     * Objetos dos registros
     * @var array
     */
    protected $list;

    /**
     * Total de registros
     * @var integer
     */
    protected $totalRows;

    /**
     * Posição inicial da consulta. Iniciado em 0
     * @var integer
     */
    protected $offset;

    /**
     * Registros por consulta. Máximo 50
     * @var integer
     */
    protected $limit;

    public function getList()
    {
        return $this->defaultValue($this->list, array());
    }

    public function getTotalRows()
    {
        return $this->totalRows;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setList(array $list = null)
    {
        $this->list = $list;
    }

    public function addList($item)
    {
        $list = ($this->getList()) ? $this->getList() : array();
        $list[] = $item;
        $this->setList($list);
    }

    public function setTotalRows($totalRows)
    {
        $this->totalRows = $this->intValue($totalRows);
    }

    public function setOffset($offset)
    {
        $this->offset = $this->intValue($offset);
    }

    public function setLimit($limit)
    {
        $this->limit = $this->intValue($limit);
    }

    public function setMapperList($className)
    {
        $this->_mapper['list'] = $className;
    }

}
