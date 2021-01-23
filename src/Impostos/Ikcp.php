<?php
namespace App\Impostos;

use App\Orcamento;

final class Ikcp extends ImpostoCom2Aliquotas {
    public function calcularImposto(Orcamento $orcamento)
    {
        if ($this->deveAlicarTaxacaoMaxima($orcamento)) {
            return $this->aplicarTaxacaoMaxima($orcamento);
        }

        return $this->aplicarTaxacaoMinima($orcamento);
    }

    protected function deveAlicarTaxacaoMaxima(Orcamento $orcamento) {
        return ($orcamento->valor > 500 &&  $orcamento->itens >10) ? true: false;
    }

    protected function aplicarTaxacaoMaxima(Orcamento $orcamento) {
        return $orcamento->valor * 0.4;
    }

    protected function aplicarTaxacaoMinima(Orcamento $orcamento) {
        return $orcamento->valor * 0.2; 
    }
}
