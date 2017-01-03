<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Nota Fiscal
 *
 * @author Maicon Sasse
 */
class Invoice extends Domain\AbstractModel
{

    /**
     * Número
     * @var integer
     */
    protected $number;

    /**
     * Série
     * @var string
     */
    protected $line;

    /**
     * Data/hora de emissão. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $issueDate;

    /**
     * Chave de acesso
     * @var string
     */
    protected $accessKey;

    public function getNumber()
    {
        return $this->number;
    }

    public function getLine()
    {
        return $this->line;
    }

    public function getIssueDate()
    {
        return $this->issueDate;
    }

    public function getAccessKey()
    {
        return $this->accessKey;
    }

    public function setNumber($number)
    {
        $this->number = $this->intValue($number);
    }

    public function setLine($line)
    {
        $this->line = $this->stringValue($line);
    }

    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;
    }

    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;
    }

}
