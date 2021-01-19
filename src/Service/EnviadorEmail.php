<?php
namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;

class EnviadorEmail {

    public function notificarTerminoLeilao(Leilao $leilao)
    {
        $sucesso = mail("dev@dev.com", 'Leilão finalizado', 'O Leilão de' . $leilao->recuperarDescricao() . 'está finalizado');

        if (!$sucesso) {
            throw new \DomainException('Erro ao enviar email');
        }
    }
}