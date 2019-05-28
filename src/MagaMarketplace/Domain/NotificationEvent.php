<?php

namespace MagaMarketplace\Domain;

/**
 * Description of NotificationEvent
 *
 * @author Maicon Sasse
 */
class NotificationEvent extends AbstractModel
{

    const STATUS_NOVO = 1;
    const STATUS_ENVIADO = 2;
    const STATUS_AGUARDANDO_ENVIO = 3;
    const STATUS_ERRO_ENVIO = 4;
    const TO_TYPE_CALLBACK = 1;
    const TO_TYPE_EMAIL = 2;

    protected $id;
    protected $sellerId;
    protected $dateCreated;
    protected $dateSent;

    /**
     * @var Notification
     */
    protected $notification;
    protected $status;
    protected $responseCode;
    protected $response;
    protected $toType;
    protected $to;
    protected $tried;
    protected $dateNextSent;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'notification' => Notification::class
    );

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function getDateSent()
    {
        return $this->dateSent;
    }

    public function setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function setNotification(Notification $notification = null)
    {
        $this->notification = $notification;
    }

    public function getStatus()
    {
        return $this->status;
    }

    static public function getStatusList()
    {
        return array(
            self::STATUS_NOVO => 'Novo',
            self::STATUS_ENVIADO => 'Enviado',
            self::STATUS_AGUARDANDO_ENVIO => 'Pendente Envio',
            self::STATUS_ERRO_ENVIO => 'Erro Envio'
        );
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

    public function getToType()
    {
        return $this->toType;
    }

    static public function getToTypeList()
    {
        return array(
            self::TO_TYPE_CALLBACK => 'Callback',
            self::TO_TYPE_EMAIL => 'Email'
        );
    }

    public function setToType($toType)
    {
        $this->toType = $toType;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getTried()
    {
        return $this->tried;
    }

    public function setTried($tried)
    {
        $this->tried = $tried;
    }

    public function getDateNextSent()
    {
        return $this->dateNextSent;
    }

    public function setDateNextSent($dateNextSent)
    {
        $this->dateNextSent = $dateNextSent;
    }

}
