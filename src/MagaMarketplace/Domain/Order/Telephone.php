<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Telefone de contato
 *
 * @author Maicon Sasse
 */
class Telephone extends Domain\AbstractModel
{

    const TYPE_HOME = 'home';
    const TYPE_CELLPHONE = 'cellphone';
    const TYPE_BUSINESS = 'business';

    /**
     * Número
     * @var string
     */
    protected $number;

    /**
     * Tipo. (home, cellphone, business)
     * @var string
     */
    protected $type;

    public function getNumber()
    {
        return $this->number;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setNumber($number)
    {
        $this->number = $this->stringValue($number);
    }

    public function setType($type)
    {
        $this->type = $type;
    }

}
