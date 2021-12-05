<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\BingoBoard;
use PHPUnit\Framework\TestCase;

class BingoBoardTest extends TestCase
{
    public function setUp(): void
    {
        $this->board = [
            [22, 13, 17, 11, 0],
            [8, 2, 23, 4, 24],
            [21, 9, 14, 16, 7],
            [6, 10, 3, 18, 5],
            [1, 12, 20, 15, 19],
        ];
    }

    public function testCreateBingoBoard()
    {
        $bingoBoard = new BingoBoard($this->board);

        $this->assertEquals(22, $bingoBoard->getXY(0, 0));
        $this->assertEquals(13, $bingoBoard->getXY(0, 1));
        $this->assertEquals(17, $bingoBoard->getXY(0, 2));
        $this->assertEquals(11, $bingoBoard->getXY(0, 3));
        $this->assertEquals(0, $bingoBoard->getXY(0, 4));

        $this->assertEquals(8, $bingoBoard->getXY(1, 0));
        $this->assertEquals(2, $bingoBoard->getXY(1, 1));
        $this->assertEquals(23, $bingoBoard->getXY(1, 2));
        $this->assertEquals(4, $bingoBoard->getXY(1, 3));
        $this->assertEquals(24, $bingoBoard->getXY(1, 4));
    }

    public function testMarkOnlyOneCell()
    {
        $bingoBoard = new BingoBoard($this->board);

        $winner = $bingoBoard->markNumber(7);
        $this->assertFalse($winner);
    }

    public function testMarkOneRowAndWin()
    {
        $bingoBoard = new BingoBoard($this->board);

        $bingoBoard->markNumber(21);
        $bingoBoard->markNumber(9);
        $bingoBoard->markNumber(14);
        $bingoBoard->markNumber(16);
        $winner = $bingoBoard->markNumber(7);
        $this->assertTrue($winner);
    }

    public function testMarkFiveNumbersAndLose()
    {
        $bingoBoard = new BingoBoard($this->board);

        $bingoBoard->markNumber(7);
        $bingoBoard->markNumber(4);
        $bingoBoard->markNumber(9);
        $bingoBoard->markNumber(5);
        $winner = $bingoBoard->markNumber(11);
        $this->assertFalse($winner);
    }
}