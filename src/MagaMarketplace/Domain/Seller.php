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
     * Ean obrigatório?
     * @var bool
     */
    protected $eanRequired;

    /**
     * Configurações diversas do Lojista
     * @var \stdClass
     */
    protected $settings;

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

    public function getEanRequired()
    {
        return $this->eanRequired;
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function getSetting($key)
    {
        return ($this->settings && isset($this->settings->$key)) ? $this->settings->$key : null;
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

    public function setEanRequired($eanRequired)
    {
        $this->eanRequired = $this->boolValue($eanRequired);
    }

    public function setSettings(\stdClass $settings = null)
    {
        $this->settings = $settings;
    }

}
