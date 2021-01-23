<?php
namespace App\Descontos;

use App\Orcamento;
abstract class Descontos {
    private Descontos $proximo_desconto;
    
    public function proximoDesconto(Descontos $desconto) {
        $this->proximo_desconto = $desconto;

        return $desconto;
    }

    function calculaDesconto(Orcamento $orcamento): float {
        if (!$this->proximo_desconto) {
            return 0;
        }

        return $this->proximo_desconto->calculaDesconto($orcamento);
    }
}