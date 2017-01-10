<?php

namespace MagaMarketplace\Domain;

/**
 * Description of Seller
 *
 * @author Maicon Sasse
 */
class Seller extends AbstractModel
{

    /**
     * Identificador
     * @var integer
     */
    protected $id;

    /**
     * Nome
     * @var string
     */
    protected $name;

    /**
     * Status
     * @var string
     */
    protected $status;

    /**
     * Url de Notificação
     * @var string
     */
    protected $notificationCallback;

    /**
     * Ean obrigatório?
     * @var bool
     */
    protected $eanRequired;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getNotificationCallback()
    {
        return $this->notificationCallback;
    }

    public function getEanRequired()
    {
        return $this->eanRequired;
    }

    public function setId($id)
    {
        $this->id = $this->intValue($id);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setNotificationCallback($notificationCallback)
    {
        $this->notificationCallback = $notificationCallback;
    }

    public function setEanRequired($eanRequired)
    {
        $this->eanRequired = $this->boolValue($eanRequired);
    }

}
