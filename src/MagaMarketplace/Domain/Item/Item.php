<?php

namespace MagaMarketplace\Domain\Item;

use \MagaMarketplace\Domain;

/**
 * Anúncio
 *
 * @author Maicon Sasse
 */
class Item extends Domain\AbstractModel
{

    /**
     * Identificador (único e que servirá de referência para consultas e alterações do item em questão)
     * @var string
     */
    protected $id;

    /**
     * Identificador Agrupador (para produtos com variação)
     * @var string
     */
    protected $productId;

    /**
     * Marca
     * @var string
     */
    protected $brand;

    /**
     * Título
     * @var string
     */
    protected $title;

    /**
     * Descrição detalhada.
     * @var string
     */
    protected $description;

    /**
     * Categoria
     * @var string
     */
    protected $category;

    /**
     * Lista de URLs das imagens. É obrigatório pelo menos uma
     * @var array
     */
    protected $images;

    /**
     * Lista de URLs de vídeos
     * @var array
     */
    protected $videos;

    /**
     * EAN
     * @var string
     */
    protected $ean;

    /**
     * Quantidade disponível para venda
     * @var Stock
     */
    protected $stock;

    /**
     * Preço
     * @var Price
     */
    protected $price;

    /**
     * Dimensões
     * @var Dimension
     */
    protected $dimensions;

    /**
     * Peso (kg)
     * @var float
     */
    protected $weight;

    /**
     * Garantia
     * @var string
     */
    protected $warranty;

    /**
     * Atributos de Variação
     * @var Variation[]
     */
    protected $variations;

    /**
     * Atributos de Características
     * @var Attribute[]
     */
    protected $attributes;

    /**
     * Ativo
     * @var boolean
     */
    protected $active;

    /**
     * Mapeamento de propriedades que sao objetos ou arrays
     * @var array
     */
    protected $_mapper = array(
        'stock' => '\\MagaMarketplace\\Domain\\Item\\Stock',
        'price' => '\\MagaMarketplace\\Domain\\Item\\Price',
        'dimensions' => '\\MagaMarketplace\\Domain\\Item\\Dimension',
        'variations' => '\\MagaMarketplace\\Domain\\Item\\Variation',
        'attributes' => '\\MagaMarketplace\\Domain\\Item\\Attribute'
    );

    public function getId()
    {
        return $this->id;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    public function getEan()
    {
        return $this->ean;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * @return Variation[]
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * Representação textual das variações
     * @return string
     */
    public function getVariationsDescription()
    {
        $result = '';
        if ($this->getVariations()) {
            foreach ($this->getVariations() as $variation) {
                if ($result) {
                    $result .= '; ';
                }
                $result .= $variation->getId() . ': ' . $variation->getValue();
            }
        }
        return ($result) ? $result : null;
    }

    /**
     * @return Attribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setId($id)
    {
        $this->id = $this->stringValue($id);
    }

    public function setProductId($productId)
    {
        $this->productId = $this->stringValue($productId);
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setImages(array $images = null)
    {
        $this->images = $images;
    }

    public function addImage($src)
    {
        $images = ($this->getImages()) ? $this->getImages() : array();
        $images[] = $src;
        $this->setImages($images);
    }

    public function setVideos(array $videos = null)
    {
        $this->videos = $videos;
    }

    public function addVideo($src)
    {
        $videos = ($this->getVideos()) ? $this->getVideos() : array();
        $videos[] = $src;
        $this->setVideos($videos);
    }

    public function setEan($ean)
    {
        $this->ean = $this->stringValue($ean);
    }

    public function setStock(Stock $stock = null)
    {
        $this->stock = $stock;
    }

    public function setPrice(Price $price = null)
    {
        $this->price = $price;
    }

    public function setDimensions(Dimension $dimensions = null)
    {
        $this->dimensions = $dimensions;
    }

    public function setWeight($weight)
    {
        $this->weight = $this->floatValue($weight);
    }

    public function setWarranty($warranty)
    {
        $this->warranty = $this->stringValue($warranty);
    }

    public function setVariations(array $variations = null)
    {
        $this->variations = $variations;
    }

    public function addVariation($id, $value)
    {
        $variations = ($this->getVariations()) ? $this->getVariations() : array();
        $att = new Variation($id, $value);
        $variations[] = $att;
        $this->setVariations($variations);
    }

    public function setAttributes(array $attributes = null)
    {
        $this->attributes = $attributes;
    }

    public function addAttribute($id, $value)
    {
        $attributes = ($this->getAttributes()) ? $this->getAttributes() : array();
        $att = new Attribute($id, $value);
        $attributes[] = $att;
        $this->setAttributes($attributes);
    }

    /**
     * @param string $id
     * @return Attribute
     */
    public function findAttribute($id)
    {
        if ($this->getAttributes()) {
            foreach ($this->getAttributes() as $att) {
                if ($att->getId() == $id) {
                    return $att;
                }
            }
        }
        return null;
    }

    public function setActive($active)
    {
        $this->active = $this->boolValue($active);
    }

}
