<?php

namespace Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\BingoBoard;
use Jdlcgarcia\Aoc2021\Submarine\Services\BingoService;
use PHPUnit\Framework\TestCase;

class BingoServiceTest extends TestCase
{
    public function setUp(): void
    {
        $this->board1 = [
            [22, 13, 17, 11, 0],
            [8, 2, 23, 4, 24],
            [21, 9, 14, 16, 7],
            [6, 10, 3, 18, 5],
            [1, 12, 20, 15, 19],
        ];

        $this->board2 = [
            [3, 15, 0, 2, 22,],
            [9, 18, 13, 17, 5],
            [19, 8, 7, 25, 23],
            [20, 11, 10, 24, 4],
            [14, 21, 16, 12, 6]
        ];

        $this->board3 = [
            [14, 21, 17, 24, 4],
            [10, 16, 15, 9, 19],
            [18, 8, 23, 26, 20],
            [22, 11, 13, 6, 5],
            [2, 0, 12, 3, 7]
        ];
    }

    public function testCreateGameAndDrawOneNumber()
    {
        $board1 = new BingoBoard($this->board1);
        $board2 = new BingoBoard($this->board2);
        $board3 = new BingoBoard($this->board3);
        $game = new BingoService([$board1, $board2, $board3]);
        $this->assertNull($game->draw(7));
    }

    public function testCreateGameAndDrawNumbersUntilWin()
    {
        $board1 = new BingoBoard($this->board1);
        $board2 = new BingoBoard($this->board2);
        $board3 = new BingoBoard($this->board3);
        $game = new BingoService([$board1, $board2, $board3]);
        $this->assertNull($game->draw(7));
        $this->assertNull($game->draw(4));
        $this->assertNull($game->draw(9));
        $this->assertNull($game->draw(5));
        $this->assertNull($game->draw(11));
        $this->assertNull($game->draw(17));
        $this->assertNull($game->draw(23));
        $this->assertNull($game->draw(2));
        $this->assertNull($game->draw(0));
        $this->assertNull($game->draw(14));
        $this->assertNull($game->draw(21));

        $this->assertEquals(4512, $game->draw(24));
    }

    public function testCreateGameAndDrawNumbersToWinAsLateAsPossible()
    {
        $board1 = new BingoBoard($this->board1);
        $board2 = new BingoBoard($this->board2);
        $board3 = new BingoBoard($this->board3);
        $game = new BingoService([$board1, $board2, $board3]);
        $draws = '7,4,9,5,11,17,23,2,0,14,21,24,10,16,13,6,15,25,12,22,18,20,8,19,3,26,1';
        foreach(explode(',', $draws) as $draw) {
            $game->drawLastWinner($draw);
        }

        $this->assertEquals(1924, $game->getLastScore());
    }
}