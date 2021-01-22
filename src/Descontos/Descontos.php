<?php
namespace App\Descontos;

use App\Orcamento;
use DomainException;

abstract class Descontos {
    private Descontos $proximo_desconto;
    public function proximoDesconto(Descontos $desconto) {
        $this->proximo_desconto = $this->proximoDesconto($desconto);
        return $desconto;
    }

    abstract function calculaDesconto(Orcamento $orcamento): float;
}