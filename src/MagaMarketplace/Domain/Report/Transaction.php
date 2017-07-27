<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Movimentação financeira
 *
 * @author Maicon Sasse
 */
class Transaction extends Domain\AbstractModel
{

    const TYPE_CREDIT = 'credit';
    const TYPE_DEBIT = 'debit';

    /**
     * Data
     * @var string
     */
    protected $date;

    /**
     * Tipo da operação. (credit, debit)
     * @var string
     */
    protected $type;

    /**
     * Pedido
     * @var Domain\Link
     */
    protected $order;

    /**
     * Valor
     * @var float
     */
    protected $value;

    /**
     * Observações
     * @var string
     */
    protected $description;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'order' => '\\MagaMarketplace\\Domain\\Link'
    );

    public function getDate()
    {
        return $this->date;
    }

    public function getType()
    {
        return $this->type;
    }

    static public function getTypeList()
    {
        return array(
            self::TYPE_CREDIT => 'Credito',
            self::TYPE_DEBIT => 'Debito'
        );
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setOrder(Domain\Link $order = null)
    {
        $this->order = $order;
    }

    public function setValue($value)
    {
        $this->value = $this->floatValue($value);
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

}
