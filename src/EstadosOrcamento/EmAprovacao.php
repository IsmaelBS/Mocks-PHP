<?php
namespace App\EstadosOrcamento;

use App\Orcamento;

class EmAprovacao extends EstadoOrcamento{

    public function aplicaDesconto(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }

    public function aprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Aprovado;
    }

    public function reprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Reprovado;   
    }
}