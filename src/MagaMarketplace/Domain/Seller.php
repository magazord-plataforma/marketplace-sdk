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
     * CPF/CNPJ
     * @var string
     */
    protected $documentNumber;

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
     * Grupo
     * @var integer
     */
    protected $groupId;

    /**
     * Configurações diversas do Lojista
     * @var \stdClass
     */
    protected $settings;

    public function getId()
    {
        return $this->id;
    }

    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }

    public function getEanRequired()
    {
        return ($this->getSetting('eanObrigatorio') === true);
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

    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $this->stringValue($documentNumber);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $this->intValue($groupId);
    }

    public function setSettings(\stdClass $settings = null)
    {
        $this->settings = $settings;
    }

}
