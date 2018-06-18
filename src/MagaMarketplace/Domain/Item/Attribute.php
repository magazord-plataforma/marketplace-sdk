<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Atributo do Anúncio
 *
 * @author Maicon Sasse
 */
class Attribute extends Domain\AbstractModel
{

    /**
     * Nome
     * @var string
     */
    protected $id;

    /**
     * Valor
     * @var string
     */
    protected $value;

    public function __construct($id = null, $value = null)
    {
        if ($id !== null) {
            $this->setId($id);
            $this->setValue($value);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
    }

    public function setValue($value)
    {
        $this->value = $this->stringValue($value);
    }

}
