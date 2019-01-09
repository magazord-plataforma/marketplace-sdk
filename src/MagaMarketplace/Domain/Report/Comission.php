<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Modelo de Comissão
 * @author Lucas Felicio Adriano
 */
class Comission extends Domain\AbstractModel
{

    const TYPE_VALUE = 'value';
    const TYPE_PERCENT = 'percent';
    const TYPE_FREIGHT_VALUE = 'freight_value';
    const TYPE_COMPOSITE_CASCADE = 'composite_cascade';

    /**
     * Identificador da Comissão
     * @var int
     */
    protected $id;

    /**
     * Produto da Comissão
     * @var Domain\Item\Item
     */
    protected $item;

    /**
     * Categoria
     * @var string
     */
    protected $category;

    /**
     * Data de Início. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $startDate;

    /**
     * Data Fim. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $finishDate;

    /**
     * Tipo da Comissão
     * @var int
     */
    protected $type;

    /**
     * Valor da Comissão
     * @var float
     */
    protected $value;

     /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = [
        'item' => '\\MagaMarketplace\\Domain\\Item\\Item',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getItem()
    {
        return $this->Item;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getFinishDate()
    {
        return $this->finishDate;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setItem(Domain\Item\Item $Item = null)
    {
        $this->Item = $Item;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    static public function getTypeList()
    {
        return [
            self::TYPE_VALUE => 'Valor',
            self::TYPE_PERCENT => 'Percentual',
            self::TYPE_FREIGHT_VALUE => 'Valor Frete',
            self::TYPE_COMPOSITE_CASCADE => 'Composto/Cascata'
        ];
    }
}