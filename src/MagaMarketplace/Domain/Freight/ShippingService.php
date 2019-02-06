<?php

namespace MagaMarketplace\Domain\Freight;

use \MagaMarketplace\Domain;

/**
 * Opção de envio do anúncio
 *
 * @author Maicon Sasse
 */
class ShippingService extends Domain\AbstractModel
{

    /**
     * Identificador
     * @var string
     */
    protected $id;

    /**
     * Nome
     * @var string
     */
    protected $name;

    /**
     * Valor
     * @var float
     */
    protected $price;

    /**
     * Prazo de entrega (dias úteis)
     * @var integer
     */
    protected $deliveryTime;

    /**
     * Mensagem/observação (apresentada para o cliente no site). Ex: Necessário retirada no balcão - Correios
     * @var string
     */
    protected $message;

    /**
     * Informações adicionais, pode ser usado pela plataforma para retornar
     * informações necessárias na importação do pedido (não apresentada para o cliente)
     * Valor irá retornar no "shippingServiceInfo" do "OrderResponse"
     * @var string
     */
    protected $additionalInfo;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
    }

    public function setName($name)
    {
        $this->name = $this->stringValue($name);
    }

    public function setPrice($price)
    {
        $this->price = $this->floatValue($price);
    }

    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $this->intValue($deliveryTime);
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $this->stringValue($message);
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $this->stringValue($additionalInfo);
    }

}
