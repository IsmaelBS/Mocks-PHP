<?php
namespace App\Descontos;

use App\Orcamento;

class DescontoParaMaisDe500 extends Descontos {

    public function calculaDesconto(Orcamento $orcamento): float
    {
        echo 'Calcula para mais de 500 reais?' . PHP_EOL;

        if ($orcamento->valor > 500.0) {
            echo 'Sim.' . PHP_EOL;

            return $orcamento->valor * 0.5;
        }
        echo 'Não. Vai para o próximo!' . PHP_EOL;

        return parent::calculaDesconto($orcamento);
    }
}