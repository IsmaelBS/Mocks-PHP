<?php
namespace App;

use App\Impostos\Imposto;

class CalculadoraImpostos {
    public function calcularImpostos(Orcamento $orcamento, Imposto $impostor) {
        return $impostor->calcularImposto($orcamento);
    }
}