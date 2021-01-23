<?php
namespace App\Impostos;

use App\Orcamento;

class Icpp extends ImpostoCom2Aliquotas {
    protected function deveAlicarTaxacaoMaxima(Orcamento $orcamento) {
        return ($orcamento->valor > 1000) ? true: false;
    }

    protected function aplicarTaxacaoMaxima(Orcamento $orcamento) {
        return $orcamento->valor * 0.2;
    }

    protected function aplicarTaxacaoMinima(Orcamento $orcamento) {
        return $orcamento->valor * 0.1; 
    }
}