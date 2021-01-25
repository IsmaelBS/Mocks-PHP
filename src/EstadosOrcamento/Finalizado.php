<?php
namespace App\EstadosOrcamento;

use App\Orcamento;
use DomainException;

class Finalizado extends EstadoOrcamento{

    public function aplicaDesconto(Orcamento $orcamento): float
    {
        throw new DomainException('Um orçamento finaliza não pode ter descontos');
    }
}