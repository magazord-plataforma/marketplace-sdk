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
    protected $zipcode;

    /**
     * Lista dos itens
     * @var FreightPreviewItem[]
     */
    protected $items;

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

}
