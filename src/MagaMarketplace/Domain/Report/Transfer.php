<?php

namespace MagaMarketplace\Domain\Report;

use \MagaMarketplace\Domain;

/**
 * Repasse financeiro
 *
 * @author Maicon Sasse
 */
class Transfer extends Domain\AbstractModel
{

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * Data de início do ciclo
     * @var string
     */
    protected $startDate;

    /**
     * Data de final do ciclo
     * @var string
     */
    protected $finishDate;

    /**
     * Data de pagamento
     * @var string
     */
    protected $paymentDate;

    /**
     * Valor total de crédito
     * @var float
     */
    protected $creditAmount;

    /**
     * Valor total de débito
     * @var float
     */
    protected $debitAmount;

    /**
     * Valor total repassado
     * @var float
     */
    protected $totalAmount;

    /**
     * Nota fiscal de servico
     * @var Domain\Order\Invoice
     */
    protected $invoice;

    /**
     * @var TransferSummaryItem[]
     */
    protected $summary;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'invoice' => '\\MagaMarketplace\\Domain\\Order\\Invoice',
        'summary' => '\\MagaMarketplace\\Domain\\Report\\TransferSummaryItem'
    );

    public function getId()
    {
        return $this->id;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getFinishDate()
    {
        return $this->finishDate;
    }

    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    public function getDebitAmount()
    {
        return $this->debitAmount;
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function setCreditAmount($creditAmount)
    {
        $this->creditAmount = $this->floatValue($creditAmount);
    }

    public function setDebitAmount($debitAmount)
    {
        $this->debitAmount = $this->floatValue($debitAmount);
    }

    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $this->floatValue($totalAmount);
    }

    public function setInvoice(Domain\Order\Invoice $invoice = null)
    {
        $this->invoice = $invoice;
    }

    public function setSummary(array $summary = null)
    {
        $this->summary = $summary;
    }

}
