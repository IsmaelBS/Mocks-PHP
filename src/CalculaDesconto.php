<?php

namespace App;

use App\Descontos\Descontos;

class CalculaDesconto {

    private $middleware;

    public function __construct(Descontos $middleware) {
        $this->middleware = $middleware;
    }

    public function calcula(Orcamento $orcamento) {
        return $this->middleware->calculaDesconto($orcamento);
    }
}