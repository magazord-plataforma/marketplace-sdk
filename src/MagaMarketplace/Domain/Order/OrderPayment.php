<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Description of OrderPayment
 *
 * @author Maicon Sasse
 */
class OrderPayment extends Domain\AbstractModel
{

    const METHOD_BOLETO = 'Boleto';
    const METHOD_TRANSFERENCIA = 'Transferencia';
    const METHOD_MASTERCARD = 'Mastercard';
    const METHOD_VISA = 'Visa';
    const METHOD_DINERS = 'Diners';
    const METHOD_HIPERCARD = 'Hipercard';
    const METHOD_AMERICAN_EXPRESS = 'AmericanExpress';
    const METHOD_AURA = 'Aura';
    const METHOD_ELO = 'Elo';
    const METHOD_DISCOVER = 'Discover';

    /**
     * Meio de Pagamento
     * @var string
     */
    protected $method;

    /**
     * Número de parcelas
     * @var integer
     */
    protected $installments;

    /**
     * Valor pago
     * @var float
     */
    protected $value;

    public function getMethod()
    {
        return $this->method;
    }

    public function getInstallments()
    {
        return $this->installments;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function setInstallments($installments)
    {
        $this->installments = $this->intValue($installments);
    }

    public function setValue($value)
    {
        $this->value = $this->floatValue($value);
    }

}
