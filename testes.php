<?php

use App\CalculadoraImpostos;
use App\CalculaDesconto;
use App\Descontos\DescontoParaMais5Itens;
use App\Descontos\DescontoParaMaisDe500;
use App\Descontos\SemDesconto;
use App\Orcamento;

require __DIR__ . '/vendor/autoload.php';

$orcamento = new Orcamento;
$orcamento->valor = 200;
$orcamento->itens = 4;


$descontoMaisde500reais
->proximoDesconto($descontoMaisde5Itens)
->proximoDesconto($semDesconto);

$calculadoraDesconto = new CalculaDesconto($descontoMaisde500reais);
echo $calculadoraDesconto->calcula($orcamento) . PHP_EOL;
