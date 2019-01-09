<?php

namespace MagaMarketplace\Domain\Report;

/**
 * Objeto de Resposta - Lista de Comissões
 * @author Lucas Felicio Adriano
 */
class ComissionListResponse extends \MagaMarketplace\Domain\ListResponse
{

    /**
     * Mapeamento de propriedades que são objetos ou arrays
     * @var array
     */
    protected $_mapper = [
        'list' => '\\MagaMarketplace\\Domain\\Report\\Comission'
    ];
}