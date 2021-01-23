<?php

use App\CalculadoraImpostos;
use App\Impostos\Icpp;
use App\Orcamento;

require __DIR__ . '/vendor/autoload.php';

$orcamento = new Orcamento;
$orcamento->valor = 2000;
$orcamento->itens = 4;


$calculadoraImposto = new CalculadoraImpostos;
echo $calculadoraImposto->calcularImpostosCom2Aliquotas($orcamento, new Icpp) . PHP_EOL;
