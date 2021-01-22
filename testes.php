<?php

use App\CalculadoraImpostos;
use App\Impostos\Icms;
use App\Impostos\Iss;
use App\Orcamento;

require __DIR__ . '/vendor/autoload.php';

$calculadoraImpostos = new CalculadoraImpostos;
$orcamento = new Orcamento;
$orcamento->valor = 1000;

echo $calculadoraImpostos->calcularImpostos($orcamento, new Icms) . PHP_EOL;
echo $calculadoraImpostos->calcularImpostos($orcamento, new Iss) . PHP_EOL;