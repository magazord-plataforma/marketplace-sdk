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
     * @var Domain\Order\OrderResponse
     */
    protected $order;

    /**
     * Valor
     * @var float
     */
    protected $value;

    /**
     * Descrição
     * @var string
     */
    protected $description;

    /**
     * Detalhes
     * @var string
     */
    protected $detail;

    /**
     * Forma de Pagamento
     * @var string
     */
    protected $paymentMethod;

    /**
     * Número da Nota Fiscal
     * @var integer
     */
    protected $invoiceNumber;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'order' => '\\MagaMarketplace\\Domain\\Order\\OrderResponse'
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
        return [
            self::TYPE_CREDIT => 'Credito',
            self::TYPE_DEBIT => 'Debito'
        ];
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

    public function getDetail()
    {
        return $this->detail;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setOrder(Domain\Order\OrderResponse $order = null)
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

    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $this->intValue($invoiceNumber);
    }

}
