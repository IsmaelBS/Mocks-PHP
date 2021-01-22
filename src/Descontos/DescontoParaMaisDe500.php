<?php
namespace App\Descontos;

use App\Orcamento;

class DescontoParaMaisDe500 extends Descontos {
    public function calculaDesconto(Orcamento $orcamento): float
    {
        if ($orcamento->valor > 500.0) {
            return $orcamento->valor * 0.5;
        }

        parent::calculaDesconto($orcamento);
    }
}