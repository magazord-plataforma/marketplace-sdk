<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 * Item da resposta do cálculo de frete
 *
 * @author Maicon Sasse
 */
class FreightPreviewResponse extends Domain\AbstractModel
{

    /**
     * CEP
     * @var integer
     */
    protected $zipcode;

    /**
     * Lista dos itens
     * @var FreightPreviewItemResponse[]
     */
    protected $items;

    /**
     * Opções de envio
     * @var ShippingService[]
     */
    protected $shippingServices;

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getShippingServices()
    {
        return $this->shippingServices;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

    public function setShippingServices(array $shippingServices = null)
    {
        $this->shippingServices = $shippingServices;
    }

}
