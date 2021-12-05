<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\BingoCell;
use PHPUnit\Framework\TestCase;

class BingoCellTest extends TestCase
{
    public function testCreateBingoCell()
    {
        $bingoCell = new BingoCell(40);
        $this->assertFalse($bingoCell->isMarked());
        $this->assertEquals(40, $bingoCell->getValue());
    }

    public function testMarkBingoCell()
    {
        $bingoCell = new BingoCell(40);
        $this->assertFalse($bingoCell->isMarked());
        $bingoCell->mark();
        $this->assertTrue($bingoCell->isMarked());
    }
}