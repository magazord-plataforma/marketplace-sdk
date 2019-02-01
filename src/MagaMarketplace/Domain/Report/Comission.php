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
     * Condição de pagamento
     * @var string
     */
    protected $paymentCondition;

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
     * Quantidade de parcelas em que a comissão será paga
     * @var int
     */
    protected $installment;

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
        return $this->item;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPaymentCondition()
    {
        return $this->paymentCondition;
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

    public function getInstallment()
    {
        return $this->installment;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setItem(Domain\Item\Item $Item = null)
    {
        $this->item = $Item;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setPaymentCondition($paymentCondition)
    {
        $this->paymentCondition = $paymentCondition;
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

    public function setInstallment($installment)
    {
        $this->installment = $installment;
    }

    static public function getTypeList()
    {
        return [
            self::TYPE_VALUE => 'Valor',
            self::TYPE_PERCENT => 'Percentual'
        ];
    }
}