<?php
namespace App\EstadosOrcamento;

use App\Orcamento;
use DomainException;

abstract class EstadoOrcamento
{
    abstract public function aplicaDesconto(Orcamento $orcamento): float;   

    public function aprova(Orcamento $orcamento)
    {
        throw new DomainException('Orcamento não pode ser aprovado');
    }
    public function reprova(Orcamento $orcamento)
    {
        throw new DomainException('Orcamento não pode ser reprovado');
    }
    public function finaliza(Orcamento $orcamento)
    {
        throw new DomainException('Orcamento não pode ser finalizado');
    }
}
