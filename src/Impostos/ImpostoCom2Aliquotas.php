<?php

namespace App\Impostos;

use App\Orcamento;

abstract class ImpostoCom2Aliquotas implements Imposto {
    public function calcularImposto(Orcamento $orcamento)
    {
        if ($this->deveAlicarTaxacaoMaxima($orcamento)) {
            return $this->aplicarTaxacaoMaxima($orcamento);
        }

        return $this->aplicarTaxacaoMinima($orcamento);
    }

    abstract protected function deveAlicarTaxacaoMaxima(Orcamento $orcamento);

    abstract protected function aplicarTaxacaoMaxima(Orcamento $orcamento);

    abstract protected function aplicarTaxacaoMinima(Orcamento $orcamento);
}