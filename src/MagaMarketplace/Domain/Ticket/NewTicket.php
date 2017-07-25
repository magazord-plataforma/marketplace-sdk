<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Novo Protocolo de atendimento
 *
 * @author Maicon Sasse
 */
class NewTicket extends Domain\AbstractModel
{

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
     * Mensagem
     * @var string
     */
    protected $message;

    /**
     * Mensagem enviada/disponível para o cliente?
     * @var bool
     */
    protected $sendClient;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'client' => '\\MagaMarketplace\\Domain\\Order\\Client',
        'order' => '\\MagaMarketplace\\Domain\\Link'
    );

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

    public function getClient()
    {
        return $this->client;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getSendClient()
    {
        return $this->sendClient;
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

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setSendClient($sendClient)
    {
        $this->sendClient = $this->boolValue($sendClient);
    }

}
