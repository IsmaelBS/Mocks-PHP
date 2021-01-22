<?php
namespace App\Impostos;

use App\Orcamento;

class Icms implements Imposto {
   
    public function calcularImposto(Orcamento $orcamento) {
        return $orcamento->valor * 0.1;
    }
}