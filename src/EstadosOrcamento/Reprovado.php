<?php
namespace App\EstadosOrcamento;

use App\Orcamento;

class Reprovado extends EstadoOrcamento{

    public function aplicaDesconto(Orcamento $orcamento): float
    {
        throw new DomainException('Um orçamento finaliza não pode ter descontos');
    }

    public function finaliza(Orcamento $orcamento)
    {
        return $orcamento->estadoAtual = new Finalizado;
    }
}