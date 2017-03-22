<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 * Cálculo de frete
 *
 * @author Maicon Sasse
 */
class FreightPreview extends Domain\AbstractModel
{

    /**
     * CEP
     * @var integer
     */
    protected $zipCode;

    /**
     * Lista dos itens
     * @var FreightPreviewItem[]
     */
    protected $items;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'items' => '\\MagaMarketplace\\Domain\\Freight\\FreightPreviewItem'
    );

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $this->intValue($zipCode);
    }

    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

}
