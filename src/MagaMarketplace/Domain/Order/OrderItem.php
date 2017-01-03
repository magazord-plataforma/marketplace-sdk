<?php

namespace MagaMarketplace\Domain\Order;

use \MagaMarketplace\Domain;

/**
 * Item do pedido
 *
 * @author Maicon Sasse
 */
class OrderItem extends Domain\AbstractModel
{

    /**
     * Anúncio
     * @var Domain\Link
     */
    protected $item;

    /**
     * Status. (new, approved, shipped, delivered, canceled)
     * OBS: - Status movido para os itens em 10/2016
     *      - As constantes ficaram no Order por compatibilidade
     * @var string
     */
    protected $status;

    /**
     * Quantidade
     * @var integer
     */
    protected $quantity;

    /**
     * Preço unitário
     * @var float
     */
    protected $price;

    /**
     * Descontos
     * @var float
     */
    protected $discount;

    /**
     * Acrescimos
     * @var float
     */
    protected $interest;

    /**
     * Valor Total do Item = (Preço unitário  * Quantidade) - Desconto + Acrescimo
     * @var float
     */
    protected $total;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'item' => '\\MagaMarketplace\\Domain\\Link'
    );

    public function getItem()
    {
        return $this->item;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDiscount()
    {
        return $this->defaultValue($this->discount, 0);
    }

    public function getInterest()
    {
        return $this->defaultValue($this->interest, 0);
    }

    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Total calculado
     * @return float
     */
    public function getEstimatedTotal()
    {
        return ($this->getPrice() * $this->getQuantity()) - $this->getDiscount() + $this->getInterest();
    }

    public function setItem(Domain\Link $item = null)
    {
        $this->item = $item;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $this->intValue($quantity);
    }

    public function setPrice($price)
    {
        $this->price = $this->floatValue($price);
    }

    public function setDiscount($discount)
    {
        $this->discount = $this->floatValue($discount);
    }

    public function setInterest($interest)
    {
        $this->interest = $this->floatValue($interest);
    }

    public function setTotal($total)
    {
        $this->total = $this->floatValue($total);
    }

}
