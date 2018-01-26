<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Protocolo de atendimento
 *
 * @author Maicon Sasse
 */
class TicketResponse extends Domain\AbstractModel
{

    const STATUS_OPENED = 'opened';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_ANSWERED = 'answered';
    const STATUS_CLOSED = 'closed';

    /**
     * Identificador
     * @var int
     */
    protected $id;

    /**
     * Data/hora de abertura. Formato: YYYY-MM-DDThh:mm:ss.TZD
     * @var string
     */
    protected $dateCreated;

    /**
     * Tipo. (Dúvidas, Vendas, Reclamações, Trocas)
     * @var string
     */
    protected $type;

    /**
     * Assunto
     * @var string
     */
    protected $subject;

    /**
     * Status
     * @var string
     */
    protected $status;

    /**
     * Cliente
     * @var Domain\Order\Client
     */
    protected $client;

    /**
     * Pedido
     * @var Domain\Link
     */
    protected $order;

    /**
     * Loja do marketplace
     * @var string
     */
    protected $store;

    /**
     * Mensagens
     * @var MessageResponse[]
     */
    protected $messages;

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
        'order' => '\\MagaMarketplace\\Domain\\Link',
        'messages' => '\\MagaMarketplace\\Domain\\Ticket\\MessageResponse'
    );

    public function getId()
    {
        return $this->id;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getStatus()
    {
        return $this->status;
    }

    static public function getStatusList()
    {
        return array(
            self::STATUS_OPENED => 'Aberto',
            self::STATUS_IN_PROGRESS => 'Em andamento',
            self::STATUS_ANSWERED => 'Respondido por Lojista',
            self::STATUS_CLOSED => 'Fechado'
        );
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getStore()
    {
        return $this->store;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setClient(Domain\Order\Client $client)
    {
        $this->client = $client;
    }

    public function setOrder(Domain\Link $order = null)
    {
        $this->order = $order;
    }

    public function setStore($store)
    {
        $this->store = $store;
    }

    public function setMessages(array $messages = null)
    {
        $this->messages = $messages;
    }

    public function addMessage(MessageResponse $message)
    {
        $messages = ($this->getMessages()) ? $this->getMessages() : array();
        $messages[] = $message;
        $this->setMessages($messages);
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

}
