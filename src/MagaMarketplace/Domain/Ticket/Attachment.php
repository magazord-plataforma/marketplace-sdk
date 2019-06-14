<?php

namespace MagaMarketplace\Domain\Ticket;

use \MagaMarketplace\Domain;

/**
 * Anexo do Atendimento
 * @author Lucas Felicio Adriano
 */
class Attachment extends Domain\AbstractModel
{

    /**
     * ID do anexo
     * @var int
     */
    protected $id;

    /**
     * Nome do anexo
     * @var string
     */
    protected $name;

    /**
     * Conteúdo do arquivo (base64)
     * @var string
     */
    protected $file;

    /**
     * Tamanho do arquivo em KB
     * @var string
     */
    protected $size;

    /**
     * Tipo do conteúdo do arquivo
     * @var string
     */
    protected $mimeType;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }
}