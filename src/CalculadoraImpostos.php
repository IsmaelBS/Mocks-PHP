<?php
namespace App;

use App\Impostos\Imposto;
use App\Impostos\ImpostoCom2Aliquotas;

class CalculadoraImpostos {
    public function calcularImpostos(Orcamento $orcamento, Imposto $imposto) {
        return $imposto->calcularImposto($orcamento);
    }

    public function calcularImpostosCom2Aliquotas(Orcamento $orcamento, ImpostoCom2Aliquotas $imposto) {
        return $imposto->calcularImposto($orcamento);
    }
}