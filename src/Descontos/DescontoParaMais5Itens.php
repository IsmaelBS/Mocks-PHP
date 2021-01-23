<?php
namespace App\Descontos;

use App\Orcamento;

class DescontoParaMais5Itens extends Descontos {

 
    public function calculaDesconto(Orcamento $orcamento): float
    {
        echo 'Calcula para mais de 5 itens?' . PHP_EOL;
        if ($orcamento->itens > 5) {
            echo 'Sim' . PHP_EOL;
            return $orcamento->valor * 0.2;
        }
        echo 'Não, vai para o próximo' . PHP_EOL;

        return parent::calculaDesconto($orcamento);
    }
}