<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Pedido
 *
 * @author Maicon Sasse
 */
class Order extends Domain\AbstractModel
{

    const STATUS_NEW = 'new';
    const STATUS_APPROVED = 'approved';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELED = 'canceled';
    const STATUS_RETURNED = 'returned';

    /**
     * Número do pedido para o cliente
     * @var string
     */
    protected $siteId;

    /**
     * Loja do marketplace
     * @var string
     */
    protected $store;

    /**
     * Data/hora de criação. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

    /**
     * Status do pedido. (new, approved, shipped, delivered, canceled)
     * Pode haver mais de um, ver detalhamento por item
     * @var array
     */
    protected $status;

    /**
     * Cliente
     * @var Client
     */
    protected $client;

    /**
     * Itens do Pedido
     * @var OrderItem[]
     */
    protected $items;

    /**
     * Endereço de entrega
     * @var ShippingAddress
     */
    protected $shippingAddress;

    /**
     * Data Limite de Postagem. Formato: YYYY-MM-DD
     * @var string
     */
    protected $latestShipDate;

    /**
     * Data estimada de entrega. Formato: YYYY-MM-DD
     * @var string
     */
    protected $estimatedDeliveryDate;

    /**
     * Identificador da opção de envio
     * @var string
     */
    protected $shippingServiceId;

    /**
     * Opção de envio
     * @var string
     */
    protected $shippingService;

    /**
     * Valor de frete
     * @var float
     */
    protected $freight;

    /**
     * Valor total
     * @var float
     */
    protected $totalAmount;

    /**
     * Data/hora última atualização. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $lastUpdate;

    /**
     * Formas de Pagamento do Pedido utilizada pelo cliente
     * @var OrderPayment[]
     */
    protected $payment;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'client' => '\\MagaMarketplace\\Domain\\Order\\Client',
        'items' => '\\MagaMarketplace\\Domain\\Order\\OrderItem',
        'shippingAddress' => '\\MagaMarketplace\\Domain\\Order\\ShippingAddress',
        'payment' => '\\MagaMarketplace\\Domain\\Order\\OrderPayment'
    );

    /**
     * Fluxo de alteração de situação permitido
     * @var array
     */
    static public $_statusFlow = array(
        self::STATUS_NEW => array(self::STATUS_APPROVED, self::STATUS_CANCELED),
        self::STATUS_APPROVED => array(self::STATUS_SHIPPED, self::STATUS_CANCELED, self::STATUS_RETURNED),
        self::STATUS_SHIPPED => array(self::STATUS_DELIVERED, self::STATUS_RETURNED),
        self::STATUS_DELIVERED => array(self::STATUS_RETURNED),
        self::STATUS_CANCELED => array(self::STATUS_RETURNED),
        self::STATUS_RETURNED => array()
    );

    public function getSiteId()
    {
        return $this->siteId;
    }

    public function getStore()
    {
        return $this->store;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Retorna um array das situações do pedido
     * @return array
     */
    public function getStatus()
    {
        if (!$this->status && $this->getItems()) {
            // Status movido para os itens em 10/2016
            $status = array();
            foreach ($this->getItems() as $orderItem) {
                if (!in_array($orderItem->getStatus(), $status)) {
                    $status[] = $orderItem->getStatus();
                }
            }
            $this->setStatus($status);
        }
        return $this->status;
    }

    /**
     * Verifica se algum dos itens está no status
     * @param string $status
     * @return boolean
     */
    public function inStatus($status)
    {
        if ($items = $this->getItems()) {
            foreach ($items as $orderItem) {
                if ($orderItem->getStatus() == $status) {
                    return true;
                }
            }
        }
        return false;
    }

    static public function getStatusList()
    {
        return array(
            self::STATUS_NEW => 'Novo',
            self::STATUS_APPROVED => 'Aprovado',
            self::STATUS_SHIPPED => 'Transporte',
            self::STATUS_DELIVERED => 'Entregue',
            self::STATUS_CANCELED => 'Cancelado',
            self::STATUS_RETURNED => 'Devolvido'
        );
    }

    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return OrderItem[]
     */
    public function getItems()
    {
        return $this->defaultValue($this->items, array());
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function getLatestShipDate()
    {
        return $this->latestShipDate;
    }

    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }

    public function getShippingServiceId()
    {
        return $this->shippingServiceId;
    }

    public function getShippingService()
    {
        return $this->shippingService;
    }

    public function getFreight()
    {
        return $this->freight;
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setSiteId($siteId)
    {
        $this->siteId = $this->stringValue($siteId);
    }

    public function setStore($store)
    {
        $this->store = $store;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setStatus(array $status = null)
    {
        $this->status = $status;
    }

    public function setClient(Client $client = null)
    {
        $this->client = $client;
    }

    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

    public function addItem(OrderItem $item)
    {
        $items = ($this->getItems()) ? $this->getItems() : array();
        $items[] = $item;
        $this->setItems($items);
    }

    public function setShippingAddress(ShippingAddress $shippingAddress = null)
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function setLatestShipDate($latestShipDate)
    {
        $this->latestShipDate = $latestShipDate;
    }

    public function setEstimatedDeliveryDate($estimatedDeliveryDate)
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

    public function setShippingServiceId($shippingServiceId)
    {
        $this->shippingServiceId = $this->stringValue($shippingServiceId);
    }

    public function setShippingService($shippingService)
    {
        $this->shippingService = $this->stringValue($shippingService);
    }

    public function setFreight($freight)
    {
        $this->freight = $this->floatValue($freight);
    }

    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $this->floatValue($totalAmount);
    }

    public function setPayment(array $payment = null)
    {
        $this->payment = $payment;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

}
