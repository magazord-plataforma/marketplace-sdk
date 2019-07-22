<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Sub-item Totalizador Repasse financeiro
 *
 * @author Maicon Sasse
 */
class TransferSummaryItem extends Domain\AbstractModel
{

    /**
     * Descrição
     * @var string
     */
    protected $description;

    /**
     * Tipo da operação. (credit, debit)
     * @var string
     */
    protected $type;

    /**
     * Valor
     * @var float
     */
    protected $value;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $this->floatValue($value);
    }

}
