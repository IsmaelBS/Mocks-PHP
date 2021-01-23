<?php
namespace App\Descontos;
use App\Descontos\Descontos;
use App\Orcamento;

class SemDesconto extends Descontos{
     public function calculaDesconto(Orcamento $orcamento): float
     {
        echo 'Sem desconto' . PHP_EOL;
        return 0;
     }
}