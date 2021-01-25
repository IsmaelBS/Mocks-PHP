<?php
namespace App\EstadosOrcamento;

use App\Orcamento;

class Aprovado extends EstadoOrcamento{

    public function aplicaDesconto(Orcamento $orcamento):float
    {
        return $orcamento->valor * 0.02;
    }

    public function finaliza(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Finalizado;
    }
}