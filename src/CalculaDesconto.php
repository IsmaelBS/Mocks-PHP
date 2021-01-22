<?php

namespace App;

use App\Descontos\Descontos;

class CalculaDesconto {
    public function calcula(Descontos $desconto,Orcamento $orcamento) {
        return $desconto->calculaDesconto($orcamento);
    }
}