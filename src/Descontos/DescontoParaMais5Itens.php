<?php
namespace App\Descontos;

use App\Orcamento;

class DescontoParaMais5Itens extends Descontos {
 
    public function calculaDesconto(Orcamento $orcamento): float
    {
        if ($orcamento->itens > 5) {
            return $orcamento->valor * 0.2;
        }
        
        parent::calculaDesconto($orcamento);
    }
}