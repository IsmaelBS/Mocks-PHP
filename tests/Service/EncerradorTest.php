<?php

use Alura\Leilao\Dao\Leilao as DaoLeilao;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Service\Encerrador;
use Alura\Leilao\Service\EnviadorEmail;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EncerradorTest extends TestCase {

    /**@var MockObject&Encerrador */
    private $encerrador;
    /**@var MockObject&EnviadorEmail */
    private $enviadorEmail;
    private $fiat147;
    private $variant;

    protected function setup():void {
        $this->fiat147 = new Leilao('Fiat 147', new \DateTimeImmutable('8 days ago'));
        $this->variant = new Leilao('Variant', new \DateTimeImmutable('10 days ago'));
        
        $this->enviadorEmail = $this->createMock(EnviadorEmail::class);
        $mockDao = $this->createMock(DaoLeilao::class);

        $mockDao->method('recuperarNaoFinalizados')
            ->willReturn([$this->fiat147, $this->variant]);

        $mockDao->method('recuperarFinalizados')
            ->willReturn([$this->fiat147, $this->variant]);
        
        $mockDao->expects($this->exactly(2))
            ->method('atualiza')
            ->withConsecutive([$this->fiat147], [$this->variant]);
        /** 
         * @var DaoLeilao $mockDao
         * @var EnviadorEmail $mockEnviadorEmail
         */
        $this->encerrador = new Encerrador($mockDao, $this->enviadorEmail);
    }

    public function testEncerrarLeilaoComMaisDeUmaSemana() {
        $this->encerrador->encerra();
        /** @var Leilao[] $leiloes */
        $leiloes = [$this->fiat147, $this->variant];
        self::assertCount(2, $leiloes);
        self::assertTrue($leiloes[0]->estaFinalizado());
        self::assertTrue($leiloes[1]->estaFinalizado());
    }

    public function testDeveContinuarOProcessoAoEncontrarErroAoEnviarEmail()
    {
        $e = new \DomainException('Erro ao enviar e-mail');
        $this->enviadorEmail
            ->expects($this->exactly(2))
            ->method('notificarTerminoLeilao')
            ->willThrowException($e);
        $this->encerrador->encerra();
    }

    public function testSoDeveEnviarLeilaoPorEmailAposFinalizado() {
        $this->enviadorEmail
            ->expects($this->exactly(2))
            ->method('notificarTerminoLeilao')
            ->willReturnCallback(function (Leilao $leilao) {
                static::assertTrue($leilao->estaFinalizado());
            });

        $this->encerrador->encerra();
    }
}