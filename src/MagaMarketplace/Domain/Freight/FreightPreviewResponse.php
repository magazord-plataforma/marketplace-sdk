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
    protected $zipCode;

    /**
     * Opções de envio
     * @var ShippingService[]
     */
    protected $shippingServices;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'shippingServices' => '\\MagaMarketplace\\Domain\\Freight\\ShippingService'
    );

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getShippingServices()
    {
        return $this->shippingServices;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $this->intValue($zipCode);
    }

    public function setShippingServices(array $shippingServices = null)
    {
        $this->shippingServices = $shippingServices;
    }

    public function addShippingService(ShippingService $service)
    {
        $services = ($this->getShippingServices()) ? $this->getShippingServices() : array();
        if ($services) {
            // Verificar se o serviço já existe, se existir não adiciona
            foreach ($services as $serviceExists) {
                if ($serviceExists->getId() == $service->getId()) {
                    return;
                }
            }
        }
        $services[] = $service;
        $this->setShippingServices($services);
    }

}
