<?php

namespace Jdlcgarcia\Aoc2021\Submarine\Services;

use Jdlcgarcia\Aoc2021\Submarine\BingoBoard;

class BingoService
{
    /** @var BingoBoard[] $boards */
    private array $boards;

    public function __construct(array $boards)
    {
        $this->boards = $boards;
    }

    public function draw(int $number): ?int
    {
        foreach($this->boards as $board) {
            if ($board->markNumber($number)) {
                return $board->getScore() * $number;
            }
        }

        return null;
    }
}