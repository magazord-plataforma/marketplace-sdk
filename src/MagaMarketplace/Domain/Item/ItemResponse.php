<?php

namespace MagaMarketplace\Domain\Item;

/**
 * Anúncio
 *
 * @author Maicon Sasse
 */
class ItemResponse extends Item
{

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_SELLING = 'selling';

    /**
     * Identificador do Marketplace (único)
     * @var string
     */
    protected $idMarketplace;

    /**
     * Código do Lojista
     * @var int
     */
    protected $sellerId;

    /**
     * Status. (pending, approved, rejected, selling)
     * @var string
     */
    protected $status;

    /**
     * Observação sobre o status
     * @var string
     */
    protected $statusDescription;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'stock' => '\\MagaMarketplace\\Domain\\Item\\StockResponse',
        'price' => '\\MagaMarketplace\\Domain\\Item\\Price',
        'dimensions' => '\\MagaMarketplace\\Domain\\Item\\Dimension',
        'variations' => '\\MagaMarketplace\\Domain\\Item\\Variation',
        'attributes' => '\\MagaMarketplace\\Domain\\Item\\Attribute'
    );

    public function getIdMarketplace()
    {
        return $this->idMarketplace;
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    static public function getStatusList()
    {
        return array(
            self::STATUS_PENDING => 'Pendente',
            self::STATUS_APPROVED => 'Aprovado',
            self::STATUS_REJECTED => 'Rejeitado',
            self::STATUS_SELLING => 'Catalogado'
        );
    }

    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    public function setIdMarketplace($idMarketplace)
    {
        $this->idMarketplace = $this->stringValue($idMarketplace);
    }

    public function setSellerId($sellerId)
    {
        $this->sellerId = $this->intValue($sellerId);
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
    }

}
