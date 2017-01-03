<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Transportadora
 *
 * @author Maicon Sasse
 */
class Carrier extends Domain\AbstractModel
{

    /**
     * CNPJ
     * @var string
     */
    protected $documentNumber;

    /**
     * Nome
     * @var string
     */
    protected $name;

    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}
