<?php

use Alura\Leilao\Dao\Leilao as DaoLeilao;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Service\Encerrador;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EncerradorTest extends TestCase {
    public function testEncerrarLeilao() {
        $leilao1 = new Leilao('Fiat 147', new DateTimeImmutable('8 days ago'));
        $leilao2 = new Leilao('Variant', new DateTimeImmutable('10 days ago'));
        
        /**@var MockObject */
        $stub = $this->createMock(DaoLeilao::class);
        $stub->method('recuperarNaoFinalizados')->willReturn([$leilao1, $leilao2]);
        $stub->method('recuperarFinalizados')->willReturn([$leilao1, $leilao2]);
        
        $stub->expects($this->exactly(2))
            ->method('atualiza')
            ->withConsecutive([$leilao1], [$leilao2]);


        $encerrador = new Encerrador($stub);
        
        $encerrador->encerra();
        
        /** @var Leilao[] $leiloes */
        $leiloes = [$leilao1, $leilao2];

        self::assertCount(2, $leiloes);
        self::assertTrue($leiloes[0]->estaFinalizado());
        self::assertTrue($leiloes[1]->estaFinalizado());
    }
}