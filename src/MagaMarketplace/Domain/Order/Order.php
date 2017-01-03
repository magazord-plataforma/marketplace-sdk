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

    /**
     * Identificador
     * @var string
     */
    protected $id;

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
     * Data estimada de entrega. Formato: YYYY-MM-DD
     * @var string
     */
    protected $estimatedDeliveryDate;

    /**
     * Identificador da opção de envio
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
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'client' => '\\MagaMarketplace\\Domain\\Order\\Client',
        'items' => '\\MagaMarketplace\\Domain\\Order\\OrderItem',
        'shippingAddress' => '\\MagaMarketplace\\Domain\\Order\\ShippingAddress'
    );

    /**
     * Fluxo de alteração de situação permitido
     * @var array
     */
    static public $_statusFlow = array(
        self::STATUS_NEW => array(self::STATUS_APPROVED, self::STATUS_CANCELED),
        self::STATUS_APPROVED => array(self::STATUS_SHIPPED, self::STATUS_CANCELED),
        self::STATUS_SHIPPED => array(self::STATUS_DELIVERED),
        self::STATUS_DELIVERED => array(),
        self::STATUS_CANCELED => array()
    );

    public function getId()
    {
        return $this->id;
    }

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
        if (!$this->status) {
            // Status movido para os itens em 10/2016
            $status = array();
            foreach ($this->getItems() as $orderItem) {
                $status[] = $orderItem->getStatus();
            }
            $this->setStatus(array_unique($status));
        }
        return $this->status;
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

    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
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

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
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

    public function setEstimatedDeliveryDate($estimatedDeliveryDate)
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
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

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

}
