<?php

use App\CalculadoraImpostos;
use App\CalculaDesconto;
use App\Descontos\DescontoParaMais5Itens;
use App\Descontos\DescontoParaMaisDe500;
use App\Descontos\SemDesconto;
use App\Orcamento;

require __DIR__ . '/vendor/autoload.php';

$calculadoraDesconto = new CalculaDesconto;
$orcamento = new Orcamento;
$orcamento->valor = 1000;
$orcamento->itens = 4;

$chain = (new DescontoParaMais5Itens)
            ->proximoDesconto(new DescontoParaMaisDe500)
            ->proximoDesconto(new SemDesconto);

echo $calculadoraDesconto->calcula($chain, $orcamento) . PHP_EOL;
